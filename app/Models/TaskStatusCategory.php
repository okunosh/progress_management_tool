<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class TaskStatusCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'status_name',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
