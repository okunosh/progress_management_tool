<x-app-layout>
    <x-slot name="header">
        <div class="hd">ようこそ{{ Auth::user()->user_name }}さん！</div>
    </x-slot>
    <style>
        .container {
            display: flex; /* フレックスボックスを使用 */
            width: 80%; /* ページの幅を80%に設定 */
            margin: 0 auto; /* 左右のマージンを自動にして中央に配置 */
        }
        .main-content {
            flex: 3; /* メインコンテンツの幅を設定 */
            margin-right: 20px; /* サイドコンテンツとの間にスペースを追加 */
        }
        .side-content {
            flex: 1; /* サイドコンテンツの幅を設定 */
        }
    </style>
    <body>
        <div class="container">
            <!-- メインコンテンツ -->
            <div class="main-content">
                <div class='hd'>あなたの目標</div>
                <div>
                    @foreach ($lgoals as $lgoal)
                        <div class="goals">
                            <div class="long_goals"><a href="/goal/{{ $lgoal->long_term_goal_id }}">{{ $lgoal->goal_name }}</a></div>
                            <p>{{ $lgoal->goal_description }}</p>
                            <a class="button" href="/goal/{{ $lgoal->long_term_goal_id }}">詳細</a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- サイドコンテンツ -->
            <div class="side-content">
                <div class="hd">最近の投稿</div>
                <div>
                    @foreach ($tasks as $task)
                        <div class="goals">
                            <h2 class="tasks"></h2>
                            <p>短期目標：{{$task['short_term_goal_name']}}</p>
                            <p>タスク：{{ $task['task_name'] }}</p>
                            <p>投稿者：{{ $task['user_name'] }}</p>
                            <p>投稿時刻: {{ $task['updated_at'] }}</p>
                        </div>
                    @endforeach
                </div>  
            </div>
        </div>
    </body>      
</x-app-layout>