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
  </header>


  <main>
    <div class="container">
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
      @foreach ($meetings as $post) 
            <div class="card-body">
              {{-- aタグでリンクにする --}}
              <a href="{{ route('posts.show', $post->id) }}">
                <h5 class="card-title">タイトル : {{  $post->name }}</h5>
              </a>
              {{-- <h5 class="card-title">タイトル : {{  $post->title }}</h5> --}}
              <p class="card-text">
                内容 : {{ $post->detail }}
            </p>
              <p class="card-text">投稿者：{{ $post->user_id }}</p>
              {{-- <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="btn btn-primary">詳細へ</a> --}}
              {{-- foreachの中の$postの中のidを送る --}}
              <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">詳細へ</a>
            </div>
            <div class="card-footer text-muted">
              投稿日時 : {{ $post->created_at }}
            </div>
           @endforeach 
    </div>
  </main>


  <footer></footer>
</body>
</html>
