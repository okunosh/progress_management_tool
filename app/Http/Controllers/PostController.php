<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\LongTermGoals;
use App\Models\ShortTermGoals;
use App\Models\Task;

class PostController extends Controller
{
    public function index()
    {
        // 自分の目標を取得
        $lgoals = LongTermGoals::where('user_id', Auth::id())->get();
    
        // 自分と他人のタスクを取得し、updated_atでソート
        $tasks = Task::where('status_category_id',3)
                        ->orderBy('updated_at', 'desc')
                        ->paginate(5);
        $taskData = $tasks->map(function ($task) {
            return $task->toTaskData(); 
        });
        ($taskData);

        return view('top_page')->with([
            'lgoals' => $lgoals,
            'tasks' => $taskData
        ]);
    }
    public function create()
    {
        return view('create');
    }

    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts' . $post->id);
    }
    
    /*
    public function show_long_goal(LongTermGoals $Lgoal)
    {
        return view('top_page')->with(['lgoals' => $Lgoal->first()]);
    }
    */

}
