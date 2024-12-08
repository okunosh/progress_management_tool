<x-app-layout>
    <x-slot name="header">
        <div class="hd">短期目標を設定</div>  
    </x-slot>
    <div class="container">
        <form action="/goal/{{ $long_term_goal->long_term_goal_id }}/create_short_term_goal" method="POST">
            @csrf
            <div>
                目標名
                <input type="text" name="short_goal[short_term_goal_name]"></input>
               
            </div>

            <div>
                説明
                <textarea name="short_goal[short_term_goal_description]"></textarea>
            </div>

            <div>
                開始日
                <input type="date" name="short_goal[planned_start_date]"></input>
            </div>
            
            <div>
                終了日
                <input type="date" name="short_goal[planned_end_date]"></input>
            </div>

            <input type="submit" class="button" value="設定する"></input>
        </form>

    </div>
</x-app-layout>