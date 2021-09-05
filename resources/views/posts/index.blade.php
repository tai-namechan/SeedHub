<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ asset('./css/posts/index.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>もくもく会募集一覧表示（作成中）</title>
</head>

<body class="index-body">
    <header>
      
    </header>


    <main>
        <div class="wrapper">
          <a href="{{ route('profiles.index') }}" class="meeting_name">My profile</a>
            <div class="container-box">
                <form class="___class_+?2___" method="post" action="{{ route('posts.search') }}">
                    @csrf
                    <select class="___class_+?3___" name="category" required>
                        <option value="0" hidden>カテゴリー</option>
                        <option value="1">もくもく</option>
                        <option value="2">ワイワイ</option>
                    </select>
                    <select class="___class_+?4___" name="timezone" required>
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
            {{-- カレンダー --}}
                {{-- <div class="box10">
                  <div class="___class_+?12___">
                      <div class="___class_+?13___">
                          <div class="___class_+?14___">
                              <div class="index-card-header">{{ $calendar->getTitle() }}</div>
                              <div class="index-card-body">
                                  {!! $calendar->render() !!}
                              </div>
                          </div>
                      </div>
                  </div>
              </div> --}}
            </div>
            {{-- 投稿一覧 --}}
            <div class="meetings">
                @foreach ($meetings as $meeting)
                    <div class="box15">
                        <div class="right">
                            <h3>
                                <a href="{{ route('posts.show', $meeting->id) }}" class="meeting_name">
                                    {{ $meeting->name }}
                                </a>
                            </h3>
                        </div>
                        <table>
                            <tr>
                                <th>開催日</th>
                                <td>{{ $meeting->start_time->format('Y年m月d日') }}</td>
                            </tr>
                            <tr>
                                <th>時間帯</th>
                                <td>{{ $meeting->start_time->format('H:i') }} 〜
                                    {{ $meeting->end_time->format('H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                @endforeach
            </div>

            
        </div>
    </main>


    <footer></footer>
</body>

</html>
