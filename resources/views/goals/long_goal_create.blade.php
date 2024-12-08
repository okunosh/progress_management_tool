<x-app-layout>
    <x-slot name="header">
        長期目標を設定
    </x-slot>
    <div class="container">
        <form action="/goal/create" method="POST">
            @csrf
            <div>
                目標名
                <input type="text" name="goal[goal_name]"></input>
            </div>

            <div>
                説明
                <textarea name="goal[goal_description]"></textarea>
            </div>

            <div>
                開始日
                <input type="date" name="goal[start_date]"></input>
            </div>
            
            <div>
                終了日
                <input type="date" name="goal[end_date]"></input>
            </div>

            <input class="button" type="submit" value="設定する"></input>
        </form>

    </div>
</x-app-layout>