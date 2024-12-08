<x-app-layout>
    <x-slot name="header">
       短期目標一覧
    </x-slot>

    <body>
        <div class="container">
            <div class='goals'>
                <div class='long_goals'>{{ $long_term_goal->goal_name}}</div>
                <p>{{ $long_term_goal->goal_description }}</p>  
                <p>開始:{{ $long_term_goal->start_date }}</p>
                <p>終了予定:{{ $long_term_goal->end_date }}</p>
            </div>
            <div class="hd"> 短期目標一覧</div>
                <a class='button short_goal_button' href="/goal/{{ $long_term_goal->long_term_goal_id }}/create_short_term_goal">短期目標を設定</a>
                
            @foreach ($short_term_goal as $short_goal)
            <div class="goals">
                <h2 class="short_goals">{{ $short_goal->short_term_goal_name }}</h2>
                <p>{{ $short_goal->short_term_goal_description }}</p>
                <a class='button' href="/goal/{{ $long_term_goal->long_term_goal_id }}/{{ $short_goal->short_term_goal_id }}">タスク一覧</a>
                </div>
        @endforeach
        </div>
    </body>

</x-app-layout>