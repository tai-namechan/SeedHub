<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        {{-- <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .link > a {
                color: #636b6f;
                padding: 0 25px;
                margin-top: 20px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
            .catch-copy {
                margin-bottom: 50px;
            }
        </style> --}}
    </head>
    <body>
        <div class="welcome wave">
            @if (Route::has('login'))
                <div class="welcome-head">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="{{ route('posts.create') }}">もくもく新規作成</a>
                        <a href="{{ route('posts.index') }}">一覧画面</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
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
        <script src="{{ asset('js/animetion.js') }}" defer></script>
    </body>
</html>
