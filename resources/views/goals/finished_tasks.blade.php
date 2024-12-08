<x-app-layout>
    <x-slot name="header">
    終了タスク一覧
    </x-slot>

    <body>
        <div class="container">
            <p>finished task一覧</p>
            @foreach ($finished_tasks as $finished_task)
                <h2 class="goals">{{ $finished_task->task_name }}
                    <p>{{ $finished_task->task_description }}</p>
                    <p>date: {{ $finished_task->planned_date}}</p>
                    <p><ノート></p>
                    @if(is_null($finished_task->note) || $finished_task->note === '')
                    <p>ノートはありません。</p>
                    @else
                        <ul>
                            <li>{{ $finished_task->note }}</li> <!-- note_content を表示 -->
                        </ul>
                    @endif
                </h2>
            @endforeach
        </div>
    </body>

</x-app-layout>