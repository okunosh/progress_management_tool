<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="css/practice_frame.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Top Page</title>
    </head>
    <body>
        <header>
            <h1 class="headline">
                <div class='post'>
                    <a>Name:{{$users->user_name}}</a>
                </div>
            </h1>
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

        <article>
            <div class="content">カレンダー</div>
            <div class="sides">
                @foreach ($lgoals as $lgoal)
                    <div class="goals">
                    <h2 class="long_goals">{{ $lgoal->goal_name }}</h2>
                    <p>{{ $lgoal->goal_description }}</p>
                    <p>進捗度：</p>
                    </div>
                @endforeach
            </div> 
            <div class="subcontent">To Do List</div>
        </article>
    
    </body>
</html>