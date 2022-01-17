<!DOCTYPE html>
<html lang="en" class="show-html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <script type="text/javascript" src="//d3js.org/d3.v3.min.js"></script> --}}
    {{-- <script type="text/javascript" src="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.css" /> --}}

    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <link rel="stylesheet" href="../css/posts/sample.css">
    <title>詳細ページ</title>
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

<body class="show-body">

    <section class="show-method">
        <article class="index-show-body">
            <div class="show-memox huifont">
                <div class="show-meeting-box">
                    <div class="meeting-name">
                        <div>ミーティング名：</div>
                        <div>
                          {{ $post->name }}
                        </div>
                    </div>

                    <div class="meeting-detail">
                        <div>詳細：</div>
                        <div>
                            {{ $post->detail }}
                        </div>
                    </div>

                    <div class="meeting-day">
                        <div>開催日：</div>
                        <div>
                            {{ $post->start_time->format('Y年m月d日') }}
                        </div>
                    </div>

                    <div class="meeting-time">
                        <div>開催時間：</div>
                        <div>
                          {{ $post->start_time->format('H:i') }} 〜
                            {{ $post->end_time->format('H:i') }}
                        </div>
                    </div>

                    <div class="meeting-url">
                        <div>開催URl：</div>
                        <div>
                            <a href="{{ $post->url }}" target="_blank">{{ $post->url }}</a>
                        </div>
                    </div>

                    <div class="meeting-button">
                      <button type="button" onclick="history.back()">戻る</button>
                    <form action="{{ route('participant.store') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $post->id }}" name="id">
                        <input type="submit" value="参加する" name="participant">
                    </form>
                    </div>
                </div>
            </div>

        </article>
    </section>

</body>

</html>
