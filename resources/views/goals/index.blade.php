<x-app-layout>
    <x-slot name="header">
        Long Term Goals
    </x-slot>
    <div>
        <a href='/goal/create'>create long term goals</a>
        
        <p>----------------</p>
        @foreach ($long_term_goals as $long_term_goal)
            <div class="goals">
                <h2 class="long_goals">{{ $long_term_goal->goal_name }}</h2>
                <p>{{ $long_term_goal->goal_description }}</p>
                <p>進捗度：</p>
                <a href="/goal/{{ $long_term_goal->long_term_goal_id }}">detail</a>
                <p>------------</p>
            </div>
        @endforeach





    </div>
</x-app-layout>