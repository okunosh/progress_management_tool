<x-app-layout>
    <x-slot name="header">
        <div class="hd">短期目標一覧</div>
    </x-slot>

    <body>
        <div class="container">
            <div class='goals'>
                <div class='long_goals'>{{ $long_term_goal->goal_name }}</div>
                <p>{{ $long_term_goal->goal_description }}</p>  
                <p>開始:{{ $long_term_goal->start_date }}</p>
                <p>終了予定:{{ $long_term_goal->end_date }}</p>
                <p>進捗率: {{ number_format($long_term_goal->progress_rate, 2) }}%</p>
            </div>
            <a class='button short_goal_button' href="/goal/{{ $long_term_goal->long_term_goal_id }}/create_short_term_goal">短期目標を設定</a>
                
            @foreach ($short_term_goal as $short_goal)
            <div class="goals">
                <h2 class="short_goals">{{ $short_goal->short_term_goal_name }}</h2>
                <p>{{ $short_goal->short_term_goal_description }}</p>
                <p>進捗率：{{ number_format($short_goal->progress_rate, 2) }}%</p>
                <a class='button' href="/goal/{{ $long_term_goal->long_term_goal_id }}/{{ $short_goal->short_term_goal_id }}">タスク一覧</a>
                
                <!-- Progress Chart -->
                <canvas id="progressChart{{ $short_goal->short_term_goal_id }}" width="800" height="50"></canvas>
            </div>
            @endforeach
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            @foreach ($short_term_goal as $short_goal)
            var ctx{{ $short_goal->short_term_goal_id }} = document.getElementById('progressChart{{ $short_goal->short_term_goal_id }}').getContext('2d');
            var progressChart{{ $short_goal->short_term_goal_id }} = new Chart(ctx{{ $short_goal->short_term_goal_id }}, {
                type: 'bar',
                data: {
                    labels: ['進捗率'],
                    datasets: [{
                        label: '{{ $short_goal->short_term_goal_name }}',
                        data: [{{ number_format($short_goal->progress_rate, 2) }}],
                        backgroundColor: 'red'
                    }]
                },
                options: {
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
    </body>
</x-app-layout>