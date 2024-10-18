<x-app-layout>
    <x-slot name="header">
        Top Page
    </x-slot>
    <div>
        <form action="/goal/create" method="POST">
            @csrf
            <div>
                name
                <input type="text" name="goal[goal_name]"></input>
            </div>

            <div>
                Description
                <textarea name="goal[goal_description]"></textarea>
            </div>

            <div>
                startdate
                <input type="date" name="goal[start_date]"></input>
            </div>
            
            <div>
                enddate
                <input type="date" name="goal[end_date]"></input>
            </div>

            <input type="submit" value="store"></input>
        </form>

    </div>
</x-app-layout>