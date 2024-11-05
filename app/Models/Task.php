<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShortTermGoals;
use App\Models\Priority;
use App\Models\TaskStatusCategory;
use App\Models\Note;




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
    
    public function notes()
    {
        return $this->HasMany(Note::class, "task_id");
    }
}
