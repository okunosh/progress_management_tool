<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortTermGoals;

class ProgressRateController extends Controller
{
    public function index()
    {
        // 短期目標とその進捗率を取得
        $shortTermGoals = ShortTermGoals::with('task')->get();

        // 全体の進捗率を計算
        $overallProgressRate = ShortTermGoals::calculateOverallProgressRate();
        dd($overallProgressRate);

        return view('goal.show', compact('shortTermGoals', 'overallProgressRate'))->with('goal.show_target', compact('shortTermGoals', 'overallProgressRate'));
    }
}
