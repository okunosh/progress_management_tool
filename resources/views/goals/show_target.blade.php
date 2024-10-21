<x-app-layout>
    <x-slot name="header">
        Short Term Goal Detail
    </x-slot>

    <body>
        <div>
            <!--task作成画面へのリンク-->
            <a href="{{ url('/goal/' . $long_term_goal->long_term_goal_id. '/'. $short_term_goal->short_term_goal_id. '/create_task') }}">create task</a>
        </div>

        
            <h1>{{ $short_term_goal->short_term_goal_name}}</h1>
            <p>{{ $short_term_goal->short_term_goal_description }}</p>
            <p>start:{{ $short_term_goal->planned_start_date }}</p>
            <p>end:{{ $short_term_goal->planned_end_date }}</p>
            <p>-------------------------------------------</p>
            <p>タスク一覧</p>
            <p>-------------------------------------------</p>


            @foreach ($tasks as $task)
                <div class="tasks">
                
                    <h2 class="task">{{ $task->task_name }}</h2>
                    <p>{{ $task->task_description }}</p>
                    <p>進捗度：</p>
                    <p>--------------------</p>

                    </div>
            @endforeach

        </div>
    </body>

</x-app-layout>