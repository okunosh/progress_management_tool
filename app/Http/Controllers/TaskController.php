<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortTermGoals;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return view('goals.task_index');
    }
}
