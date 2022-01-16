<!DOCTYPE html>
<html class="welcome-html" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
</head>

<body class="welcome-body">
    <main class="welcome-main">
        <div class="welcome wave ">
            @if (Route::has('login'))
                <div class="welcome-head">
                    @auth
                        <div class="btn-border-gradient-wrap">
                            <a href="{{ url('/home') }}" class="btn btn-border-gradient">Home</a>
                        </div>
                        <div class="btn-border-gradient-wrap">
                            <a href="{{ route('posts.create') }}" class="btn btn-border-gradient">もくもく新規作成</a>
                        </div>
                        <div class="btn-border-gradient-wrap">
                            <a href="{{ route('posts.index') }}" class="btn btn-border-gradient">一覧画面</a>
                        </div>
                    @else
                        <div class="btn-border-gradient-wrap">
                            <a href="{{ route('login') }}" class="btn btn-border-gradient">Login</a>
                        </div>
                        @if (Route::has('register'))
                            <div class="btn-border-gradient-wrap">
                                <a href="{{ route('register') }}" class="btn btn-border-gradient">Register</a>
                            </div>
                        @endif
                    @endauth

                </div>
            @endif

            <div class="welcome-content">
                <div class="welcome-content__title">
                    <h1>Seed Hub</h1>
                </div>
                <div class="welcome-content__catch-copy">
                    <p>Platform for engineers by engineers</p>
                </div>
               <div class="link">
                    <a href="/sample">Sample</a>
                </div> 
            </div>
            <canvas id="waveCanvas"></canvas>
        </div>
    </main>

    <script src="{{ asset('js/wave.js') }}" defer></script>
</body>

</html>
