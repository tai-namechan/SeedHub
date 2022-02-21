<!DOCTYPE html>
<html lang="ja" class="index-html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ secure_asset('./css/posts/index.css') }}"> --}}
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <link rel="stylesheet" href="../css/posts/sample.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <!-- ファビコン -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>もくもく会募集一覧表示（作成中）</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- icon -->
    <script src="https://kit.fontawesome.com/ff9f3f2de1.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- <script src="{{ asset('/js/like.js') }}"></script> -->
</head>

<header class="sample-header">
    <div class="sample-openbtn4"><span></span><span></span><span></span></div>

    <!-- メニューjs -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- <script src="{{ secure_asset('js/like.js') }}"></script> -->
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
                <!-- ajaxでいいねボタン -->
                @auth
                <!-- Meeting.phpに作ったisLikedByメソッドをここで使用 -->
                @if (!$meeting->isLikedBy(Auth::user()))
                <span class="likes">
                    <i class="fas fa-star icon-color like-toggle" data-meeting-id=" {{ $meeting->id }} "></i>
                    <small>ええやん</small>
                    <span class="like-counter">{{$meeting->likes_count}}</span>
                </span>
                <!-- 
                <button type="submit" class="like-toggle" style="background-color: #fefcf6" data-meeting-id=" {{ $meeting->id }} ">
                    <i class="fas fa-star icon-color" id="like-icon"></i>
                    <small>ええやん</small>
                    <span class="like-counter">{{$meeting->likes_count}}</span>
                </button> -->
                @else
                <button type="button" class="like-toggle liked" style="background-color: #fefcf6" data-meeting-id=" {{ $meeting->id }} ">
                    <!-- else -->
                    <i class="far fa-star" id="like-icon"></i>
                    <small>めっちゃええやん</small>
                    <span class="like-counter">{{$meeting->likes_count}}</span>
                </button>
                @endif
                @endauth
                @guest
                <span class="likes">
                    <i class="fas fa-music heart"></i>
                    <span class="like-counter"></span>
                </span><!-- /.likes -->
                @endguest



                <!-- <button type="button" class="" style="background-color: #fefcf6" id="like_icon" data-id="">                 
                    <i class="fas fa-star icon-color" id="like-icon"></i>
                    <i class="far fa-star" id="like-icon"></i>
                    <small>お気に入り</small>
                </button> -->

            </div>
            @endforeach
        </div>
        </div>
        </div>
        </div>
        </div>

        </div>
    </main>


    <!-- JavaScript -->
    <script>
        $(function() {
            var like = $(''); //like-toggleのついたiタグを取得し代入。

            var likeMeetingId; //変数を宣言（なんでここで？）

            like.on('click', function() {
                //onはイベントハンドラー
                var $this = $(this); //this=イベントの発火した要素＝iタグを代入

                likeMeetingId = $this.data('meeting_id'); //iタグに仕込んだdata-meeting_idの値を取得
                //ajax処理スタート

                $.ajax({
                        headers: {
                            //HTTPヘッダ情報をヘッダ名と値のマップで記述
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
                        url: '/like',
                        //通信先アドレスで、このURLをあとでルートで設定します
                        method: 'POST',
                        //HTTPメソッドの種別を指定します。1.9.0以前の場合はtype:を使用。
                        data: {
                            //サーバーに送信するデータ
                            'meeting_id': likeMeetingId //いいねされた投稿のidを送る

                        }
                    }) //通信成功した時の処理
                    .done(function(data) {
                        $this.toggleClass('liked'); //likedクラスのON/OFF切り替え。

                        $this.next('.like-counter').html(data.meeting_likes_count);
                    }) //通信失敗した時の処理
                    .fail(function() {
                        console.log('fail');
                    });
            });
        }); // $()はjQueryのセレクターの書き方。$はjQueryの略
        // thisは変数の一種で、特殊な変数。プログラムが自動的に値を代入するもの。今回はイベントが発火した変数like＝iタグが代入されています
        // なぜ$thisと$が付くのか？jQueryにおいて、変数を宣言する際、$はjQueryオブジェクト（＝$()でセレクトした要素）を入れるための変数宣言で、 $は必須ではないが、通常の変数と区別するのに通常使います。
        // .onはイベントハンドラー。第一パラメータにイベントの種類、第二パラメータにハンドラとして無名関数を取っています
        // .dataはjQueryのメソッド。HTML内に仕込んだカスタムdata属性の値を取得することができます。ここでは投稿のid（review_id）を受け取ります。取得したい要素.data('カスタムdata属性の名前')という文法になります。
        // $.ajax()は、非同期処理を行うイベントハンドラ。$.はこれまたjQueryのこと。中のパラメータはコード内の説明ご参照。ここの大きな構文は、$.ajax().done().fail()です。通信に成功したら、doneメソッドを、失敗したらfailメソッドを実行します。
        // attr()は、attributeの略で日本語訳すると「属性」です。つまり、なんてことはない、指定された属性の値を取ってくるメソッドです。（日本人プログラマの不利なところは一回英単語の意味を知らないといけないとこだなと最近思ってます）
        // .next()は、セレクター。Sibling（兄弟）の後ろの要素を全て、つまり全ての弟を返します。その中から特定の要素を指定する場合は、パラメータで指定します
        // obj.html(htmlString)は、obj（＝英語でいうところの目的語）にhtmlStringをセットします。.done()のパラメータdataにはコントローラからreview_likes_countという名前の「新規いいね後の総いいね数」が（←あとでコントローラで見ていきましょう）、{review_likes_count : 1}というJSONの形で渡ってきます。それをdata.review_likes_countとい文法でプロパティにアクセスします。JavaScriptの記法では「変数名.プロパティ名（=key）」でそのオブジェクトの対応する値が取得できます。この.をドット演算子と呼びます。このサイトがわかりやすいです。
        // https://www.sejuku.net/blog/61326
        // .fail()には、処理が失敗したときの指示をコールバック関数で書いておきます。コールバック関数とは、他の関数（ここではfail）に引数として渡される関数です。ここでは、単純にconsoleに'fail'という文字列をログを出力するというだけの実装にしています。
    </script>
</body>

</html>
