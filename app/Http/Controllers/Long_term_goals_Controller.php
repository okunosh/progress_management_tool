<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LongTermGoals;
use App\Models\ShortTermGoals;
use Illuminate\Support\Facades\Auth;

class Long_term_goals_Controller extends Controller
{
    public function index()
    {
        $long_term_goals = LongTermGoals::where('user_id', Auth::id())->get();;
        return view('goals.index')->with([
            'long_term_goals' => $long_term_goals
        ]);
    }

    public function create()
    {
        return view('goals.long_goal_create');
    }

    public function show(LongTermGoals $long_term_goal, ShortTermGoals $short_term_goal)
    {
        $short_term_goal = $long_term_goal->shortTermGoals;
        //dd($short_term_goal);
        return view('goals.show')->with([
            'long_term_goal' => $long_term_goal,
            'short_term_goal' => $short_term_goal
    ]);
    }
    public function store(Request $request, LongTermGoals $long_term_goal)
    {
        $input = $request['goal'];
        $input['user_id'] = Auth::id();
        $long_term_goal->fill($input)->save();

        return redirect('/goal');
    }
}
