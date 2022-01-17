<!DOCTYPE html>
<html lang="ja" class="index-html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ asset('./css/posts/index.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="../css/posts/sample.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>もくもく会募集一覧表示（作成中）</title>

</head>

<header class="sample-header">
    <div class="sample-openbtn4"><span></span><span></span><span></span></div>

    <!-- <script type="text/javascript" src="../views/users/script.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/5-2-4/js/5-2-4.js"></script>

    <!-- ロゴ -->

    <div class="btn-border-gradient-wrap">
        <a href="{{ url('/') }}" class="btn btn-border-gradient">SeedHub</a>
    </div>
    <!-- メールアイコン -->

    <div class="sample-mailbtn">
        <i class="sample-far fa-envelope"></i>
        <div class="sample-mail icon"></div>
    </div>

    <script src="{{ asset('../css/posts/script.js') }}"></script>
</header>

<body class="index-body">

    <main class="index-method">
        <div class="index-notebody">
            <div class="index-note_wrap">
                <div class="index-note">
                    <div>
                        <div class="index-wrapper">

                            <a href="{{ route('profiles.index') }}">マイページ</a>
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
                                    <div class="index-card-header">{{ $calendar->getTitle() }}
                            </div>
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
            <div class="index-memox">

                <table class="index-box-content">

                    <tr class="index-name">
                        <th>ミーティング名</th>
                        <td>
                            <a href="{{ route('posts.show', $meeting->id) }}" class="meeting_name">
                                {{ $meeting->name }}
                            </a>
                        </td>
                    </tr>

                    <tr class="index-day">
                        <th>開催日</th>
                        <td>{{ $meeting->start_time->format('Y年m月d日') }}</td>
                    </tr>
                    <tr class="index-time">
                        <th>時間帯</th>
                        <td>{{ $meeting->start_time->format('H:i') }} 〜
                            {{ $meeting->end_time->format('H:i') }}
                        </td>
                    </tr>
                </table>
            </div>
            @endforeach
        </div>
        </div>
        </div>
        </div>
        </div>

        </div>
    </main>

</body>

</html>