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
                            <canvas id="progressChart{{ $lgoal->long_term_goal_id }}"  width="100" height="8"></canvas>
                        </div>
                    @endforeach
                </div>
                <!-- Progress Chart -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    @foreach ($lgoals as $lgoal)
                    var ctx{{ $lgoal->long_term_goal_id }} = document.getElementById('progressChart{{ $lgoal->long_term_goal_id }}').getContext('2d');
                    var progressChart{{ $lgoal->long_term_goal_id }} = new Chart(ctx{{ $lgoal->long_term_goal_id }}, {
                        type: 'bar',
                        data: {
                            labels: ['進捗率'],
                            datasets: [{
                                label: '{{ $lgoal->goal_name }}',
                                data: [{{ number_format($lgoal->progress_rate, 2) }}],
                                backgroundColor: '#0476e8'
                            }]
                        },
                        options: {
                            // responsive: true, // レスポンシブ対応
                            // maintainAspectRatio: false, // アスペクト比を無効にする
                            // aspectRatio: 2.5, // アスペクト比を設定
                            indexAxis: 'y', 
                            scales: {
                                x: {
                                    beginAtZero: true,
                                    max: 100
                                }       
                            },
                            plugins: {
                                legend: {
                                    display: false 
                                }
                            }
                        }
                    });
                    @endforeach
                </script>
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