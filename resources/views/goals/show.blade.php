<x-app-layout>
    <x-slot name="header">
       短期目標一覧
    </x-slot>

    <body>
        <div>
            <a href="/goal/{{ $long_term_goal->long_term_goal_id }}/create_short_term_goal">短期目標を設定</a>

        </div>

        <div>
            <h1>{{ $long_term_goal->goal_name}}</h1>
            <p>{{ $long_term_goal->goal_description }}</p>
            <p>start:{{ $long_term_goal->start_date }}</p>
            <p>end:{{ $long_term_goal->end_date }}</p>
            <p>-------------------------------------------</p>
            <p>-------------------------------------------</p>
        </div>
        @foreach ($short_term_goal as $short_goal)
        <div class="goals">
            <h2 class="short_goals">{{ $short_goal->short_term_goal_name }}</h2>
            <p>{{ $short_goal->short_term_goal_description }}</p>
            <p>進捗度：</p>
            <a href="/goal/{{ $long_term_goal->long_term_goal_id }}/{{ $short_goal->short_term_goal_id }}">タスク一覧</a>
            <p>--------------------</p>

            </div>
    @endforeach
    </body>

</x-app-layout>