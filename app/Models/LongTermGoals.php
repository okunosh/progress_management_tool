<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShortTermGoals;

class LongTermGoals extends Model
{
    use HasFactory;

    protected $primaryKey = 'long_term_goal_id';

    protected $fillable = [
        'goal_name',
        'goal_description',
        'start_date',
        'end_date',
        'user_id',
        'progress_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function shortTermGoals(){
        return $this->hasMany(ShortTermGoals::class, 'long_term_goal_id', 'long_term_goal_id');
    }

    public function getProgressRateAttribute(){
        $totalShortTermGoals = $this->shortTermGoals()->count();
        $completedShortTermGoals = $this->shortTermGoals()->where('progress_status', 100.0)->count();

        return $totalShortTermGoals > 0 ? ($completedShortTermGoals / $totalShortTermGoals) * 100 : 0;
    }

    // public static function calculateOverallProgressRate(){
    //     $longTermGoals = self::with('shortTermGoals')->get();
        
    //     $completedShortTermGoalsCount = ShortTermGoals::where('progress_status', 100.0)->count();

    //     $totalLongTermGoals = $longTermGoals->count();
    //     return $totalLongTermGoals > 0 ? ($completedShortTermGoals / $totalLongTermGoals) * 100 : 0;
    // }
    public static function calculateOverallProgressRate()
    {
        $longTermGoals = self::with('shortTermGoals')->get();
        
        $totalShortTermGoals = 0;
        $completedShortTermGoals = 0;

        foreach ($longTermGoals as $goal) {
            $totalShortTermGoals += $goal->shortTermGoals()->count();
            $completedShortTermGoals += $goal->shortTermGoals()->where('progress_status', 100.0)->count();
        }

        return $totalShortTermGoals > 0 ? ($completedShortTermGoals / $totalShortTermGoals) * 100 : 0;
    }
}
