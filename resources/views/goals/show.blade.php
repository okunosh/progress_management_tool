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
                <!--Progress Bar-->
                <canvas id="progressChart{{ $long_term_goal->long_term_goal_id }}" data-goal-id="{{ $long_term_goal->long_term_goal_id }}" data-progress-rate="{{ number_format($long_term_goal->progress_rate, 2) }}" data-goal-name="{{ $long_term_goal->goal_name }}" data-goal-type="long" width="100" height="8"></canvas>
            </div>
            <!-- Progress Chart -->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="{{ asset('js/ProgressRateChart.js') }}"></script>
            <a class='button short_goal_button' href="/goal/{{ $long_term_goal->long_term_goal_id }}/create_short_term_goal">短期目標を設定</a>
            <a class="button back_button" href="/goal/">長期目標一覧に戻る</a>
                
            @foreach ($short_term_goal as $short_goal)
            <div class="goals">
                <h2 class="short_goals">{{ $short_goal->short_term_goal_name }}</h2>
                <p>{{ $short_goal->short_term_goal_description }}</p>
                <p>進捗率：{{ number_format($short_goal->progress_rate, 2) }}%</p>
                <a class='button' href="/goal/{{ $long_term_goal->long_term_goal_id }}/{{ $short_goal->short_term_goal_id }}">タスク一覧</a>
                
                <!-- Progress Chart -->
                <canvas id="progressChart{{ $short_goal->short_term_goal_id }}" data-goal-id="{{ $short_goal->short_term_goal_id }}" data-progress-rate="{{ number_format($short_goal->progress_rate, 2) }}" data-goal-name="{{ $short_goal->goal_name }}" data-goal-type="short" width="100" height="8"></canvas>
                </div>
            @endforeach
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="{{ asset('js/ProgressRateChart.js') }}"></script>
    </body>
</x-app-layout>