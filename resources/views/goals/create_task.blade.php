<x-app-layout>
    <x-slot name="header">
        Create Task
    </x-slot>
    <!-- resources/views/goals.create_task.blade.php -->
    <form action="/goal/{{ $long_term_goal_id }}/{{ $short_term_goal_id }}/create_task" method="POST">
        @csrf
        
            <div>
                name
                <input type="text" name="task[task_name]"></input>
               
            </div>

            <div>
                Description
                <textarea name="task[task_description]"></textarea>
            </div>

            <div>
                date
                <input type="date" name="task[planned_date]"></input>
            </div>

            <div>
                duedate
                <input type="date" name="task[due_date]"></input>
            </div>

            <div>
                priority_level
                <select name="task[priority_level]">
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
            </div>

            

        <button type="submit">Create Task</button>
    </form>

</x-app-layout>