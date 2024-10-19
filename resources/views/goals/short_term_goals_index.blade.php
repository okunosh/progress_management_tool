<x-app-layout>
    <x-slot name="header">
        Short Term Goals
    </x-slot>
    <div>
        <a href="/goal/{{ $long_term_goal->long_term_goal_id }}/short_term_goal/create_short_term_goal">create</a>
    </div>

    @foreach ($short_term_goal as $short_goal)
        <div class="goals">
            <h2 class="short_goals">{{ $short_goal->short_term_goal_name }}</h2>
            <p>{{ $short_goal->short_goal_description }}</p>
            <p>進捗度：</p>
            <a href='/goal/short_term_goal'>create task</a>
            </div>
    @endforeach



</x-app-layout>