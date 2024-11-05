<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShortTermGoals;
use App\Models\Priority;
use App\Models\TaskStatusCategory;




class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'task_id';
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'short_term_goal_id',
        'task_id',
        'task_name',
        'task_description',
        'planned_date',
        'status_category_id',
        'due_date',
        'priority_level',
        'note'
    ];

    public function shortTermGoal()
    {
        return $this->belongsTo(ShortTermGoals::class, 'short_term_goal_id', 'short_term_goal_id');
    }

    public function priority()
    {
        return $this->hasOne(Priority::class, 'priority_id', 'priority');
    }

    public function taskStatusCategory()
    {
        return $this->belongsTo(TaskStatusCategory::class, 'status_category_id');
    }
    public function getByLimit(int $limit=10)
    {
        return $this->orderBy('updated_at', 'DESCL')->limit($limit)->get();
    }

    public function getPaginateByLimit(int $limit=10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit);
    }

    public function toTaskData()
{
    $shortTermGoal = $this->shortTermGoal;
    $longTermGoal = $shortTermGoal ? $shortTermGoal->longTermGoal : null; // リレーションを取得

    // ユーザー名を取得
    $userName = $longTermGoal && $longTermGoal->user ? $longTermGoal->user->user_name : 'N/A';

    return [
        'task_name' => $this->task_name,
        'updated_at' => $this->updated_at,
        'planned_date' => $this->planned_date,
        'short_term_goal_name' => $shortTermGoal ? $shortTermGoal->short_term_goal_name : 'N/A', // 短期目標名
        'long_term_goal_id' => $longTermGoal ? $longTermGoal->id : null, // 長期目標ID
        'long_term_goal_name' => $longTermGoal ? $longTermGoal->goal_name : 'N/A', // 長期目標名
        'user_name' => $userName // ユーザー名
    ];
}
}
