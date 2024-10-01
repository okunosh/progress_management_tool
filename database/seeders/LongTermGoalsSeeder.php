<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LongTermGoalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('long_term_goals')->insert([
            [
                'user_id' => 1, 
                'goal_name' => 'Learn Laravel',
                'goal_description' => 'Complete Laravel tutorials and build a project.',
                'start_date' => Carbon::now()->subMonths(2),
                'end_date' => Carbon::now()->addMonths(4),
                'progress_rate' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2, 
                'goal_name' => 'Run a Marathon',
                'goal_description' => 'Train for and complete a marathon.',
                'start_date' => Carbon::now()->subMonths(1),
                'end_date' => Carbon::now()->addMonths(5),
                'progress_rate' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // 他のダミーデータを追加
        ]);
    }
}
