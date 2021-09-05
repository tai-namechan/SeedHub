<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('./css/posts/index.css') }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>もくもく会募集一覧表示（作成中）</title>
</head>
<body>
  <header>
    <h1>♪ぴえん、ぴえん、ぴえん、ぴえん〜</h1>
    <a href="{{ route('profiles.index') }}">My profile</a>
  </header>


  <main>
    <div class="container">
      <div class="">
        <form class=""method="post" action="{{ route('posts.search') }}">
            @csrf
            <select class="" name="category" required>
                <option value="0" hidden>カテゴリー</option>
                <option value="1">もくもく</option>
                <option value="2">ワイワイ</option>
            </select>
            <select class="" name="timezone" required>
                <option value="0" hidden>時間帯</option>
                <option value="1">朝</option>
                <option value="2">昼</option>
                <option value="3">夜</option>
            </select>
            <input class="search" type="submit" value="もくもく検索">
        </form>
        <form action="{{ route('posts.reset') }}" method="get">
          <input class="reset" type="submit" value="リセット">
        </form>
      </div>
      <div class="meetings">
        @foreach ($meetings as $meeting)
        <div class="meeting">
          <div class="left">
            <p>
              {{ $meeting->start_time->format('Y年m月d日') }}
            </p>
            <p>
              {{ $meeting->start_time->format('H:i') }} 〜 {{ $meeting->end_time->format('H:i') }}
            </p>
          </div>
          <div class="right">
            <h3>
              <a href="{{ route('posts.show', $meeting->id) }}" class="meeting_name">
              {{ $meeting->name }}
              </a>
            </h3>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $calendar->getTitle() }}</div>
                <div class="card-body">
                        {!! $calendar->render() !!}
                </div>
            </div>
        </div>
    </div>
  </main>
  

  <footer></footer>
</body>
</html>
