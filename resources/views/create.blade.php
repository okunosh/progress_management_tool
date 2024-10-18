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
            <header></header>
            <nav></nav>
            <main>
                <h1>Let's set your goal.</h1>
                <form action="/posts" method="POST">
                    @csrf
                    <div class="Final_Goal">
                        <h2>Final Goal</h2>
                        <input type="text" name="post[long_term_goal]" placeholder="Long term goal" /><h3>Goal Description</h3>
                        <textarea name="post[long_term_goal_description]" placeholder="Description"></textarea>
                        <h4>Start Date:</h4>
                        <h4>End Date:</h4>
                    </div>

                    <div class="Small Goal">
                        <h2>Small Goal</h2>
                        <input name="post[short_term_goal]" placeholder="Short term goal"></textarea>
                        <h3>Goal Description</h3>
                        <textarea name="post[short_term_goal_description]" placeholder="Description"></textarea>
                        <h4>Start Date:</h4>
                        <h4>End Date:</h4>
                        <h3>Task</h3>
                    </div>
                        <input type="submit" value="store"/>
                </form>



            </main>
            <footer></footer>
        </body>
        
    </x-app-layout>

</html>