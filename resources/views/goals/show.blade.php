<x-app-layout>
    <x-slot name="header">
        Long Term Goals Detail
    </x-slot>

    <body>
        <div>
            

        </div>

        <div class='goals'>
            <div class='long_goals'>{{ $long_term_goal->goal_name}}</div>
            <p>{{ $long_term_goal->goal_description }}</p>  
            <p>start:{{ $long_term_goal->start_date }}</p>
            <p>end:{{ $long_term_goal->end_date }}</p>
        </div>
        <div class="hd"> short term goal一覧
            <a class='button short_goal_button' href="/goal/{{ $long_term_goal->long_term_goal_id }}/create_short_term_goal">create short term goal</a>
        </div>
             
        @foreach ($short_term_goal as $short_goal)
        <div class="goals">
            <h2 class="short_goals">{{ $short_goal->short_term_goal_name }}</h2>
            <p>{{ $short_goal->short_term_goal_description }}</p>
            <a class='button' href="/goal/{{ $long_term_goal->long_term_goal_id }}/{{ $short_goal->short_term_goal_id }}">detail</a>
            </div>
    @endforeach
    </body>

</x-app-layout>