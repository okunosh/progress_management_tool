<x-app-layout>
    <x-slot name="header">
        Short Term Goal Detail
    </x-slot>

    <body>
        <div>
            <!--task作成画面へのリンク-->
            <a href="{{ url('/goal/' . $long_term_goal->long_term_goal_id. '/short_term_goal/'. $short_term_goal->short_term_goal_id. '/task') }}">task</a>
        </div>

        
            <h1>{{ $short_term_goal->short_term_goal_name}}</h1>
            <p>{{ $short_term_goal->short_term_goal_description }}</p>
            <p>start:{{ $short_term_goal->planned_start_date }}</p>
            <p>end:{{ $short_term_goal->planned_end_date }}</p>
            <p>-------------------------------------------</p>
            <p>ここにタスク一覧を表示しても良いかも。</p>
        </div>
    </body>

</x-app-layout>