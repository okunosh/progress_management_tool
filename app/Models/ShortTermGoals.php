<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortTermGoals extends Model
{
    use HasFactory;

    protected $primaryKey = 'short_term_goal_id';

    protected $fillable = [
        'short_term_goal',
        'short_term_goal_description',
        'planned_start_date',
        'planned_end_date',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(Post::class);
    }
}
