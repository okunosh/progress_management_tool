<x-app-layout>
    <x-slot name="header">
        タスク一覧
    </x-slot>

    <body>
        <div class="container">
            <!-- 成功メッセージ -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div>
                <div class='goals'>
                    <div class='short_goals'>{{ $short_term_goal->short_term_goal_name}}</div>
                    <p>{{ $short_term_goal->short_term_goal_description }}</p>
                    <p>開始:{{ $short_term_goal->planned_start_date }}</p>
                    <p>終了予定:{{ $short_term_goal->planned_end_date }}</p>
                </div>

                <div class="hd">タスク一覧</h1>
                    <!-- finished tasks一覧へのリンク -->
                    <p><a class="button" href="/goal/{{ $long_term_goal->long_term_goal_id }}/{{ $short_term_goal->short_term_goal_id }}/finished">終了したタスク</a></p>
                <!--task作成画面へのリンク-->
                <a class='button task_button' href="/goal/{{ $long_term_goal->long_term_goal_id }}/{{ $short_term_goal->short_term_goal_id }}/create_task">タスクを作成</a>

                @foreach ($tasks as $task)
                    <div class="goals">
                        <div class="tasks">{{ $task->task_name }}</div>
                        <p>{{ $task->task_description }}</p>
                        <p>予定日：{{ $task->planned_date}}</p>
                        <p>進捗状況：</p>
                        <form action="/goal/{{$long_term_goal->long_term_goal_id}}/{{$short_term_goal->short_term_goal_id}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="short_term_goal_id" value="{{ $short_term_goal->short_term_goal_id }}">
                            <input type="hidden" name="task_id" value="{{ $task->task_id }}">
                            <input type="hidden" name="task_name" value="{{ $task->task_name }}">
                            <input type="hidden" name="task_description" value="{{ $task->task_description }}">
                            <input type="hidden" name="planned_date" value="{{ $task->planned_date }}">
                            <input type="hidden" name="due_date" value="{{ $task->due_date }}">
                            <input type="hidden" name="priority_level" value="{{ $task->priority_level }}">


                            <select name="status_category_id">
                                @foreach ($statusCategories as $statusCategory)
                                    <option value="{{ $statusCategory->id }}" {{ $task->status_category_id == $statusCategory->id ? 'selected' : '' }}>
                                        {{ $statusCategory->status_name }}
                                    </option>
                                @endforeach
                            </select>
                            <div>
                                メモ
                                <textarea name="note" value="{{ $task->note }}"></textarea>
                                <button type="submit" class='button'>save and update</button>
                            </div>
                        </form>

                        <form action="/goal/{{$long_term_goal->long_term_goal_id}}/{{$short_term_goal->short_term_goal_id}}" id="form_{{ $task->task_id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="task_id" value="{{ $task->task_id }}">
                            <button type="button" class='button' onclick="deleteTask({{ $task->task_id }})">delete</button> 
                        </form>


                    </div>
                @endforeach

            </div>
            <script>
                function deleteTask(id) {
                    'use strict'

                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
        </div>
    </body>

</x-app-layout>