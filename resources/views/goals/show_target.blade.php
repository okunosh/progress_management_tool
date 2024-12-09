<x-app-layout>
    <x-slot name="header">
        <div class="hd">タスク一覧</div>
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
                    <p>進捗率：{{ number_format($short_term_goal->progress_rate, 2) }}%</p>
                    <!-- <p>progress_status{{$short_term_goal->progress_status}}</p> -->

                     <!-- Progress Chart -->
                    <canvas id="progressChart{{ $short_term_goal->short_term_goal_id }}" width="800" height="50"></canvas>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        var ctx{{ $short_term_goal->short_term_goal_id }} = document.getElementById('progressChart{{ $short_term_goal->short_term_goal_id }}').getContext('2d');
                        var progressChart{{ $short_term_goal->short_term_goal_id }} = new Chart(ctx{{ $short_term_goal->short_term_goal_id }}, {
                            type: 'bar',
                            data: {
                                labels: ['進捗率'],
                                datasets: [{
                                    label: '{{ $short_term_goal->short_term_goal_name }}',
                                    data: [{{ number_format($short_term_goal->progress_rate, 2) }}],
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
                    </script>    
                </div>
                <!--短期目標一覧へのリンク-->
                <a class='button back_button' href="/goal/{{ $long_term_goal->long_term_goal_id }}">短期目標一覧に戻る</a>
                <!-- finished tasks一覧へのリンク -->
                <p><a class="button" href="/goal/{{ $long_term_goal->long_term_goal_id }}/{{ $short_term_goal->short_term_goal_id }}/finished">終了したタスク</a></p>
               
                <!--task作成画面へのリンク-->
                <a class='button task_button' href="/goal/{{ $long_term_goal->long_term_goal_id }}/{{ $short_term_goal->short_term_goal_id }}/create_task">タスクを作成</a>

                @foreach ($tasks as $task)
                    <div class="goals">
                        <div class="tasks">{{ $task->task_name }}</div>
                        <p>{{ $task->task_description }}</p>
                        <p>予定日：{{ $task->planned_date}}</p>
                        <div class="inline-elements">
                            <p>進捗状況：</p>
                            <form clas="inline-form" action="/goal/{{$long_term_goal->long_term_goal_id}}/{{$short_term_goal->short_term_goal_id}}" method="POST">
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
                        </div>
                        
                            <div>
                                <p>メモ</p>
                                <textarea name="note" value="{{ $task->note }}"></textarea>
                                <p><button type="submit" class='button'>更新</button></p>
                            </div>
                        </form>
                        <form class="inline-form" action="/goal/{{$long_term_goal->long_term_goal_id}}/{{$short_term_goal->short_term_goal_id}}" id="form_{{ $task->task_id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="task_id" value="{{ $task->task_id }}">
                            <button type="button" onclick="deleteTask({{ $task->task_id }})">削除する</button> 
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