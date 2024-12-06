<x-app-layout>
    <x-slot name="header">
        タスクを設定
    </x-slot>
    <!-- resources/views/goals.create_task.blade.php -->
    <form action="/goal/{{ $long_term_goal_id }}/{{ $short_term_goal_id }}/create_task" method="POST">
        @csrf
        
            <div>
                タスク名
                <input type="text" name="task[task_name]"></input>
               
            </div>

            <div>
                説明
                <textarea name="task[task_description]"></textarea>
            </div>

            <div>
                日付
                <input type="date" name="task[planned_date]"></input>
            </div>

            <div>
                締切日
                <input type="date" name="task[due_date]"></input>
            </div>

            <div>
                重要度
                <select name="task[priority_level]">
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
            </div>

            

        <button type="submit">設定する</button>
    </form>

</x-app-layout>