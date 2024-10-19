<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LongTermGoals;

class ShortTermGoals extends Model
{
    use HasFactory;

    protected $primaryKey = 'short_term_goal_id';

    protected $fillable = [
        'long_term_goal_id',
        'short_term_goal_name',
        'short_term_goal_description',
        'planned_start_date',
        'planned_end_date',
        'user_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function longTermGoal()
    {
        return $this->belongsTo(LongTermGoals::class, 'long_term_goal_id', 'long_term_goalid');
    }
}
