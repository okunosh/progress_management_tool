<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="css/practice_frame.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Top Page</title>
    </head>

    <x-app-layout>
        <x-slot name="header">
            Top Page
        </x-slot>
        <body>
            <!--
            <header>
                {{--
                <h1 class="headline">
                    <div class='post'>
                        <a>Name:{{$users->user_name}}</a>
                    </div>
                </h1>
                --}}
                <div class="navigation">
                    <nav>
                        <ul>
                            <li>Make New Project</li>
                            <li>Notes</li>
                            <li>Achivements</li>
                        </ul>
                    </nav>
                </div>
            </header>
            -->
            
            <article>
            <h2>you are : {{ Auth::user()->user_name }}</h2>
                <div class="content">Calendar</div>
                <div class="sides">
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
                <div class="subcontent">To Do List</div>
            </article>
        </body>
    </x-app-layout>

    
</html>