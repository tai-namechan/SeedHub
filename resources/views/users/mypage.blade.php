<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="//d3js.org/d3.v3.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.css" />
    <title>Profile</title>
</head>
<body>

    {{-- <artIcle> --}}
    <div id="cal-heatmap"></div>

    <script type="text/javascript">
        var cal = new CalHeatMap();
        cal.init({
            itemSelector: "#cal-heatmap",
            domain: "day",
            range: 12, data: "datas-years.json",
            start: new Date(),
    });
    </script>
    {{-- </artIcle> --}}


    <article class="userinformation">
        <section class="userinformation-title">
            <h2>My Profile </h2>
        </section>


        <section class="userinformation-content">
            {{-- ユーザー名 --}}
            <div class="username">
                <h3>My Profile</h3>
                <a href="{{ route('profiles.create') }}">プロフィール作成</a>
                {{-- <h3>{{$senduserdata->name}}</h3> --}}
            </div>

            <div class="cancel-the-membership">
                <div class="cancel-title">
                    <h4>ユーザー退会</h4>
                </div>
                <p>
                    ユーザー登録を退会します。<br>退会後、あなたが過去に投稿された口コミは<br>"退会ユーザー"の投稿として、残ることになります
                </p>
                {{-- <form action="{{route('deactive.form')}}" method="get">
                    <input type="hidden" name="id" value="">
                    <button type="submit" class="deletedata-button">退会ページ</button>
                </form> --}}
            </div>
        </section>
    </article>

</body>
</html>
