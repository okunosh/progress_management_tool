<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LongTermGoals;
use App\Models\ShortTermGoals;


class Short_term_goals_Controller extends Controller
{
    public function index(LongTermGoals $long_term_goal)
    {
        $short_term_goal = $long_term_goal->shortTermGoals;
        //dd($short_term_goals);
        return view('goals.short_term_goals_index')->with([
                'long_term_goal' => $long_term_goal,
                'short_term_goal' => $short_term_goal,
        ]);
    }

    public function create(LongTermGoals $long_term_goal)
    {

        $short_term_goal = $long_term_goal->shortTermGoals;//model名
        //dd($short_term_goals);
        //$long_term_goals = LongTermGoals::first(); //first()は違う。
        //$long_term_goal_id = $request->query('long_term_goal_id');//そんなのない。

        return view('goals.short_goal_create')->with([
            'long_term_goal' => $long_term_goal,
            'short_term_goal' => $short_term_goal,

        ]);
    }

    public function store(Request $request, ShortTermGoals $short_term_goal, LongTermGoals $long_term_goal)
    {
        $input = $request['short_goal'];
        //$input['long_term_goal_id'] =  $request->input('short_goal.long_term_goal_id');//わからない。
        $input['long_term_goal_id'] = $long_term_goal ->long_term_goal_id;
        $short_term_goal->fill($input)->save();

        return redirect('/goal/'.$long_term_goal->long_term_goal_id.'/short_term_goal');
    }

}
