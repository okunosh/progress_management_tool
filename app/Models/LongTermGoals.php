<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LongTermGoals extends Model
{
    use HasFactory;

    protected $primaryKey = 'long_term_goal_id';

    protected $fillable = [
        'goal_name',
        'goal_description',
        'start_date',
        'end_date',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(Post::class);
    }
}
