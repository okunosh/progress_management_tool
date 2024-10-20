<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShortTermGoals;
use App\Models\Priority;



class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'short_term_goal_id',
        'task_name',
        'task_description',
        'planned_date',
        'status',
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

}
