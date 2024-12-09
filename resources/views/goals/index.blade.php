<x-app-layout>
    <x-slot name="header">
        <div class="hd">長期目標一覧</div>
    </x-slot>
    <div class="container">
        <a class='button long_goal_button' href='/goal/create'>長期目標を設定する</a>
        <div>
            @foreach ($long_term_goals as $long_term_goal)
                <div class="goals">
                    <h2 class="long_goals">{{ $long_term_goal->goal_name }}</h2>
                    <p>{{ $long_term_goal->goal_description }}</p>
                    <p>進捗率: {{ number_format($long_term_goal->progress_rate, 2) }}%</p>
                    <a class="button" href="/goal/{{ $long_term_goal->long_term_goal_id }}">短期目標一覧</a>
                    <!--Progress Bar-->
                    <canvas id="progressChart{{ $long_term_goal->long_term_goal_id }}" data-goal-id="{{ $long_term_goal->long_term_goal_id }}" data-progress-rate="{{ number_format($long_term_goal->progress_rate, 2) }}" data-goal-name="{{ $long_term_goal->goal_name }}" width="100" height="8"></canvas>
                </div>
            @endforeach
        </div>
        <!-- Progress Chart -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="{{ asset('js/overallProgressRateChart.js') }}"></script>
    </div>
</x-app-layout>