<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRFトークンをhead内metaタグにセット -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/cal-heatmap/3.3.10/cal-heatmap.css" />
    <link rel="stylesheet" href="../css/posts/sample.css">
    <title>草生やしたーい</title>

    <!-- icon -->
    <script src="https://kit.fontawesome.com/ff9f3f2de1.js" crossorigin="anonymous"></script>
</head>
<body>

<header class="header">
        <div class="openbtn4"><span></span><span></span><span></span></div>

        <!-- <script type="text/javascript" src="../views/users/script.js"></script> -->


        <!-- ロゴ -->
        <p class="lead">SeedHub</p>
        <!-- メールアイコン -->
        <div class="mailbtn">
            <i class="far fa-envelope"></i>
            <!-- <div class="mail icon"></div> -->
        </div>

</header>
<div id="app">

<like-component></like-component>
<example-component></example-component>
                </div>

<like-component></like-component>
<example-component></example-component>

<!-- ビルドされ出力されるapp.jsを読み込む -->
<script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
