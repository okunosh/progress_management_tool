<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        "task_id",
        "note_content"
    ];
    public function task()
    {
        return $this->belongsTo(Tasks::class, 'task_id', 'task_id');

    }
}
