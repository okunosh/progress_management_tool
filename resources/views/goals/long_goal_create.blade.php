<x-app-layout>
    <x-slot name="header">
        <div class="hd">長期目標を設定</div>
    </x-slot>
    <div class="container">
        <a class="button" href="/goal/">長期目標一覧に戻る</a>
        <div class="goals">
            <form action="/goal/create" method="POST">
                @csrf
                <div>
                    <p class='hd'>目標名：</p>
                    <input type="text" name="goal[goal_name]"></input>
                </div>

                <div>
                    <p class="hd">説明：</p>
                    <textarea name="goal[goal_description]"></textarea>
                </div>

                <div>
                    <p class="hd">開始日：</p>
                    <input type="date" name="goal[start_date]"></input>
                </div>
                
                <div>
                    <p class="hd">終了日：
                    </p>
                    <input type="date" name="goal[end_date]"></input>
                </div>

                <input class="button" type="submit" value="設定する"></input>
            </form>
        </div>
        

    </div>
</x-app-layout>