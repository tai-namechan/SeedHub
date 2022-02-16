<!DOCTYPE html>
<html lang="en" class="mypage-html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <script type="text/javascript" src="//d3js.org/d3.v3.min.js"></script> --}}
    {{-- <script type="text/javascript" src="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.css" /> --}}

    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <link rel="stylesheet" href="../css/posts/sample.css">
    <title>Profile</title>


    <script type="text/javascript" src="https://d3js.org/d3.v3.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.css" />
    <!-- ファビコン -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">
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

<body class="mypage-body">

    <section class="mypage-method">

        <article class="user-body">
            <div class="memox huifont">


                <div class="userinformation-create">
                    <a href="{{ route('profiles.create') }}">プロフィール作成</a>
                </div>

                <article class="mypage-article">
                    <section class="userinformation-content">
                        {{-- ユーザー名 --}}

                        <div class="userimg">
                            <img src="../img/meeting.png" alt="">
                        </div>

                        <div class="username-title">ユーザー名</div>
                        <div class="username">
                            <h3>{{$senduserdata->name}}</h3>
                        </div>

                        <div class="myintroduce-title">紹介文</div>
                        <div class="myintroduce">ここに紹介文</div>

                        <!-- <div class="cancel-the-membership">
                        <a href="">退会ページ</a>
                        {{-- <form action="{{route('deactive.form')}}" method="get">
                            <input type="hidden" name="id" value="">
                            <button type="submit" class="deletedata-button">退会ページ</button>
                        </form> --}}
                    </div> -->
                    </section>

                    <section class="mypage-note_wrap">
                        <div class="mypage-note">
                            あああ
                        </div>
                    </section>
                </article>

                <body>
                    <div id="sample-heatmap" class="sample-heatmap"></div>
                </body>
                <script type="text/javascript">
                    var datas = {
                        "1530370800": 1, // 2018/07/01
                        "1530457200": 3, // 2018/07/02
                        "1533049200": 5, // 2018/08/01
                        "1533135600": 7, // 2018/08/02
                        "1546268400": 10 // 2019/01/01
                    };
                    var cal = new CalHeatMap();
                    var now = new Date();
                    cal.init({
                        itemSelector: '#sample-heatmap',
                        domain: "month",
                        data: datas,
                        domainLabelFormat: '%Y-%m',
                        start: new Date(now.getFullYear(), now.getMonth() - 11),
                        cellSize: 10,
                        range: 12,
                        legend: [1, 3, 5, 7, 10],
                    });
                </script>
            </div>

        </article>
    </section>

</body>

</html>
