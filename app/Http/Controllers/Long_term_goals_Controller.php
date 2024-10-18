<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LongTermGoals;
use Illuminate\Support\Facades\Auth;

class Long_term_goals_Controller extends Controller
{
    public function index()
    {
        return view('goals.index');
    }

    public function create()
    {
        return view('goals.long_goal_create');
    }

    public function store(Request $request, LongTermGoals $long_term_goals)
    {
        $input = $request['goal'];
        $input['user_id'] = Auth::id();
        
        $long_term_goals->fill($input)->save();

        return redirect('/goal');

    }
}
