<x-app-layout>
    <x-slot name="header">
        <div class="hd">短期目標を設定</div>  
    </x-slot>
    <div class="container">
        <!--短期目標一覧へのリンク-->
        <a class='button' href="/goal/{{ $long_term_goal->long_term_goal_id }}">短期目標一覧に戻る</a>
        <div class="goals">
            <form action="/goal/{{ $long_term_goal->long_term_goal_id }}/create_short_term_goal" method="POST">
                @csrf
                <div>
                    <p class="hd">目標名：</p>
                    <input type="text" name="short_goal[short_term_goal_name]"></input>
                </div>

                <div>
                    <p class="hd">説明：</p>
                    <textarea name="short_goal[short_term_goal_description]"></textarea>
                </div>

                <div>
                    <p class="hd">開始日：</p>
                    <input type="date" name="short_goal[planned_start_date]"></input>
                </div>
                
                <div>
                    <p class="hd">終了日：</p>
                    <input type="date" name="short_goal[planned_end_date]"></input>
                </div>

                <input type="submit" class="button" value="設定する"></input>
            </form>
        </div>
        

    </div>
</x-app-layout>