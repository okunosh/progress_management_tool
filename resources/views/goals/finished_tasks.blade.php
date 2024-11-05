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
            <h3>ノート</h3>
            @if(is_null($finished_task->note) || $finished_task->note === '')
                <p>ノートはありません。</p>
            @else
                <ul>
                    <li>{{ $finished_task->note }}</li> <!-- note_content を表示 -->
                </ul>
            @endif
            <p>---------------------</p>
        @endforeach
    </body>

</x-app-layout>