<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="UTF-8">
        <link rel="stylesheet" href="css/practice_frame.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Top Page</title>
    </head>
    <body>

    <header>
        <h1 class="headline">
            <div class='post'>
                <a>Your Name:{{$users->name}}</a>
            </div>
        </h1>
        <div class="wrapper">
            <div class="one">Make New Project</div>
            <div class="one">Notes</div>
            <div class="one">Achievements</div>
        </div>

        <ul class="nav-list">
            <li class="nav-list-item">
              <a>Make New Project</a>
            </li>
            <li class="nav-list-item">Notes</li>
            <li class="nav-list-item">Achievements</li>
          </ul>
    
    
    </header>

    <article>
        <div class="content">メインコンテンツ</div>
        <div class="side">
            <h2>プロジェクト1:</h2>
            <p>進捗度：</p>
            <p>サイドバー</p>
        </div> 
        <div class="subcontent">サブコンテンツ</div>
    </article>
    
    </body>
</html>