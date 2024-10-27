<x-app-layout>
    <x-slot name="header">
        Finished tasks
    </x-slot>

    <body>
        <div>
        <p>-------------------------------------------</p>
        <p>finished task一覧</p>
        <p>-------------------------------------------</p>

        @foreach ($finished_tasks as $finished_task)
            <h2 class="task">{{ $finished_task->task_name }}</h2>
            <p>{{ $finished_task->task_description }}</p>
            <p>date: {{ $finished_task->planned_date}}</p>
            <p>---------------------</p>
        @endforeach
    </body>

</x-app-layout>