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
    </style>
    <body>
        <div class="container">
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
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- サイドコンテンツ -->
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