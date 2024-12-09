<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortTermGoals;
use App\Models\LongTermGoals;

class ProgressRateController extends Controller
{
    public function index()
    {
        // 短期目標とその進捗率を取得
        $shortTermGoals = ShortTermGoals::with('task')->get();

        // 全体の進捗率を計算
        $shortTermProgressRate = ShortTermGoals::calculateShortTermProgressRate();

        return view('goal.show', compact('shortTermGoals', 'shortTermProgressRate'))->with('goal.show_target', compact('shortTermGoals', 'shortTermProgressRate'));
    }

    public function overallProgress()
    {
        $longTermGoals = LongTermGoals::with('shortTermGoals')->get();
        $overallProgressRate = LongTermGoals::calculateOverallProgressRate();
        return view('goal.index', compact('longTermGoals', 'overallProgressRate'))->with('top_page', compact('longTermGoals', 'overallProgressRate'));
    }
}
