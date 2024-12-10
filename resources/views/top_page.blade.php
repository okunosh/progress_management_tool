<x-app-layout>
    <x-slot name="header">
        <div class="hd">ようこそ{{ Auth::user()->user_name }}さん！</div>
    </x-slot>
    <style>
        .container {
            display: flex; 
            width: 80%; 
            margin: 0 auto; 
        }
        .main-content {
            flex: 3; 
            margin-right: 20px; 
        }
        .side-content {
            flex: 1; 
        }
        .goals canvas {
            width: 100% !important;
        }
        
    </style>
    <body>
        <div class="container">
            <!-- 自分の目標 -->
            <!-- メインコンテンツ -->
            <div class="main-content">
                <div class='hd'>あなたの目標</div>
                <div>
                    @foreach ($lgoals as $lgoal)
                        <div class="goals">
                            <div class="long_goals"><a href="/goal/{{ $lgoal->long_term_goal_id }}">{{ $lgoal->goal_name }}</a></div>
                            <p>{{ $lgoal->goal_description }}</p>
                            <p>進捗率: {{ number_format($lgoal->progress_rate, 2) }}%</p>
                            <a class="button" href="/goal/{{ $lgoal->long_term_goal_id }}">詳細</a>
                            <canvas id="progressChart{{ $lgoal->long_term_goal_id }}" data-goal-id="{{ $lgoal->long_term_goal_id }}" data-progress-rate="{{ number_format($lgoal->progress_rate, 2) }}" data-goal-name="{{ $lgoal->goal_name }}" data-goal-type="long" width="100" height="8"></canvas>
                        </div>
                    @endforeach
                </div>
                <!-- Progress Chart -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script src="{{ asset('js/ProgressRateChart.js') }}"></script>
            </div>

            <!-- 他人の目標 -->
            <div class="side-content">
                <div class="hd">最近の投稿</div>
                <div>
                    @foreach ($tasks as $task)
                        <div class="goals">
                            <h2 class="tasks"></h2>
                            <p>短期目標：{{$task['short_term_goal_name']}}</p>
                            <p>タスク：{{ $task['task_name'] }}</p>
                            <p>投稿者：{{ $task['user_name'] }}</p>
                            <p>投稿時刻: {{ $task['updated_at'] }}</p>
                        </div>
                    @endforeach
                </div>  
            </div>
        </div>
    </body>      
</x-app-layout>