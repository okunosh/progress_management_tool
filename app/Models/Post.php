<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function long_term_goals()
    {
        return $this->hasMany(LongTermGoals::class);
    }

    public function short_term_goals()
    {
        return $this->hasMany(ShortTermGoals::class);
    }
    
}
