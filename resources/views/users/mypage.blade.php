<!DOCTYPE html>
<html lang="en" class="mypage-html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <script type="text/javascript" src="//d3js.org/d3.v3.min.js"></script> --}}
    {{-- <script type="text/javascript" src="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.css" /> --}}
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Profile</title>
</head>
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
                        {{-- <h3>{{$senduserdata->name}}</h3> --}}
                        〇〇
                    </div>
    
                    <div class="myintroduce-title">紹介文</div>
                    <div class="myintroduce">ここに紹介文</div>
    
                    <div class="cancel-the-membership">
                        <a href="">退会ページ</a>
                        {{-- <form action="{{route('deactive.form')}}" method="get">
                            <input type="hidden" name="id" value="">
                            <button type="submit" class="deletedata-button">退会ページ</button>
                        </form> --}}
                    </div>
                </section>
    
                <section class="mypage-note_wrap">
                    <div class="mypage-note">
    あああ
                    </div>
                </section>
            </article>
            
        </div>

    </article>
</section>

</body>
</html>
