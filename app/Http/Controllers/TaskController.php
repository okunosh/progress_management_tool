<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortTermGoals;
use App\Models\Task;
use App\Models\TaskStatusCategory;

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

        return redirect('/goal/'.$long_term_goal_id.'/'.$short_term_goal_id);
    }

    public function finish(Task $task, $long_term_goal_id, $short_term_goal_id)
    { 
        $finished_tasks = Task::where('status_category_id', 3)
                               ->where('short_term_goal_id', $short_term_goal_id)
                               ->get();
        //dd($finished_tasks);
        return view('goals.finished_tasks')->with([
            'finished_tasks'=>$finished_tasks
        ]);

    }
    public function updateStatus(Request $request, Task $task, $long_term_goal_id, $short_term_goal_id)
    {
        $request->validate([
            'status_category_id' => 'required|exists:task_status_categories,id',
        ]);
        $task = Task::where('short_term_goal_id', $short_term_goal_id)
             ->where('task_name', $request->task_name)
             ->firstOrFail();
        $task->note = $request->note;
        $task->status_category_id = $request->status_category_id;
        $task->save();
        
        return redirect()->back()->with('success', 'タスクの進捗とメモが更新されました！');
    }


    public function delete(Request $request, Task $task, $long_term_goal_id, $short_term_goal_id)
    {
        $task = Task::where('task_id', $request->input('task_id'))->firstOrFail();
        $task->delete();
        //dd($task);
        return redirect('/goal/'.$long_term_goal_id.'/'.$short_term_goal_id);
    }

    // public function share(Task $task)
    // {
    //     $shared_tasks = Task::where('status_category_id', 3)
    //                             ->where('short_term_goal_id', 2)
    //                             ->get();
    //     //dd($finished_tasks);
    //     return view('top_page')->with([
    //     'shared_tasks'=>$shared_tasks
    //     ]);

    // }
}
