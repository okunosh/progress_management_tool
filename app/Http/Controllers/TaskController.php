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
    public function create($long_term_goal_id, $short_term_goal_id)
    {
        $short_term_goal = ShortTermGoals::findOrFail($short_term_goal_id);
        $long_term_goal = $short_term_goal->long_term_goal_id;
        
        return view('goals.create_task', compact('long_term_goal_id', 'short_term_goal_id'));
    }

    public function store(Request $request, Task $task, $long_term_goal_id, $short_term_goal_id)
    {
        $short_term_goal = ShortTermGoals::findOrFail($short_term_goal_id);
        $long_term_goal_id = $short_term_goal->long_term_goal_id;

        $input = $request['task'];
        $input['short_term_goal_id'] = $short_term_goal_id;
        $task->fill($input)->save();

        //dd($short_term_goal_id);

        return redirect('/goal/'.$long_term_goal_id.'/'.$short_term_goal_id);
    }

    public function finish(Task $task)
    { 
        $finished_tasks = Task::where('status', 'completed')->get();
        //dd($finished_tasks);
        return view('goals.finished_tasks')->with([
            'finished_tasks'=>$finished_tasks
        ]);

    }

    public function delete(Request $request, Task $task, $long_term_goal_id, $short_term_goal_id)
    {
        $task = Task::where('task_id', $request->input('task_id'))->firstOrFail();
        $task->delete();
        //dd($task);
        return redirect('/goal/'.$long_term_goal_id.'/'.$short_term_goal_id);
    }
}
