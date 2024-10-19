<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShortTermGoals;

class LongTermGoals extends Model
{
    use HasFactory;

    protected $primaryKey = 'long_term_goal_id';

    protected $fillable = [
        'long_term_goal_id',
        'goal_name',
        'goal_description',
        'start_date',
        'end_date',
        'user_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function shortTermGoals()
{
    return $this->hasMany(ShortTermGoals::class, 'long_term_goal_id', 'long_term_goal_id');
}
}
