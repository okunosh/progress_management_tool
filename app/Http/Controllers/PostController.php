<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\LongTermGoals;
use App\Models\ShortTermGoals;

class PostController extends Controller
{
    public function index()
    {
        $user = User::first();
        $lgoal = LongTermGoals::all();

        return view('top_page')->with([
            'users' => $user,
            'lgoals' => $lgoal
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
