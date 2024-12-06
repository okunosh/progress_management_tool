<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/practice_frame.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            Create Task
        </x-slot>

        <h2>{{ Auth::user()->user_name }}</h2>
        <article>
            <div class="content">
                <h3>あなたの目標</h3>
                <div>
                    <p>--------------</p>
                    @foreach ($lgoals as $lgoal)
                        <div class="goals">
                            <h2 class="long_goals">{{ $lgoal->goal_name }}</h2>
                            <p>{{ $lgoal->goal_description }}</p>
                            <p>進捗度：</p>
                            <p>--------------</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="sides">
                <!-- サイドコンテンツ -->
                 <h1>最近の投稿</h1>
                 <div>
                 <p>--------------</p>
                    @foreach ($tasks as $task)
                        <div class="tasks">
                            <h2 class="tasks"></h2>
                            <p>短期目標：{{$task['short_term_goal_name']}}</p>
                            <p>タスク：{{ $task['task_name'] }}</p>
                            <p>投稿者：{{ $task['user_name'] }}</p>
                            <p>投稿時刻: {{ $task['updated_at'] }}</p>
                            
                            <p>--------------</p>
                        </div>
                    @endforeach
                 </div>

            </div> 
            <div class="subcontent">
                <h3>To Do</h3>
                <!-- To Do Listの内容 -->
            </div>
        </article>
    </x-app-layout>
</body>
</html>
