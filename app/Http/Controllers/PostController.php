<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\LongTermGoals;

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
    
    /*
    public function show_long_goal(LongTermGoals $Lgoal)
    {
        return view('top_page')->with(['lgoals' => $Lgoal->first()]);
    }
    */

}
