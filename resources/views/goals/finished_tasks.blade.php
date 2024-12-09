<x-app-layout>
    <x-slot name="header">
        <div class="hd">終了タスク一覧</div>
    </x-slot>

    <body>
        <div class="container">
            @foreach ($finished_tasks as $finished_task)
                <h2 class="goals">
                    <div class="tasks">{{ $finished_task->task_name }}</div>
                    <p>{{ $finished_task->task_description }}</p>
                    <p>更新日: {{ $finished_task->planned_date}}</p>
                    <p class="hd"><メモ></p>
                    @if(is_null($finished_task->note) || $finished_task->note === '')
                    <p>メモはありません。</p>
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