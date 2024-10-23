<x-app-layout>
    <x-slot name="header">
        Short Goal
    </x-slot>
    <div>
        <form action="/goal/{{ $long_term_goal->long_term_goal_id }}/create_short_term_goal" method="POST">
            @csrf
            <div>
                name
                <input type="text" name="short_goal[short_term_goal_name]"></input>
               
            </div>

            <div>
                Description
                <textarea name="short_goal[short_term_goal_description]"></textarea>
            </div>

            <div>
                startdate
                <input type="date" name="short_goal[planned_start_date]"></input>
            </div>
            
            <div>
                enddate
                <input type="date" name="short_goal[planned_end_date]"></input>
            </div>

            <input type="submit" value="store"></input>
        </form>

    </div>
</x-app-layout>