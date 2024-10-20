<x-app-layout>
    <x-slot name="header">
        Long Term Goals Detail
    </x-slot>

    <body>
        <div>
            <a href="{{ url('/goal/' . $long_term_goal->long_term_goal_id. '/short_term_goal') }}">short term goal</a>
        </div>

        <div>
            <h1>{{ $long_term_goal->goal_name}}</h1>
            <p>{{ $long_term_goal->goal_description }}</p>
            <p>start:{{ $long_term_goal->start_date }}</p>
            <p>end:{{ $long_term_goal->end_date }}</p>
            <p>-------------------------------------------</p>
            <p>ここにshort term goal一覧を表示しても良いかも。</p>
        </div>
    </body>

</x-app-layout>