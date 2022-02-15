<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="../css/posts/sample.css">
    <link rel="stylesheet" href="../css/posts/bootstrap-social.css">
    <!-- icon -->
    <script src="https://kit.fontawesome.com/ff9f3f2de1.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="app">

        <header class="sample-header">
            <div class="home-sample-openbtn4"><span></span><span></span><span></span></div>

            <!-- <script type="text/javascript" src="../views/users/script.js"></script> -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
            <script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/5-2-4/js/5-2-4.js"></script>

            <!-- ロゴ -->

            <div class="btn-border-gradient-wrap">
                <a href="{{ url('/') }}" class="home-btn btn-border-gradient">SeedHub</a>
            </div>
            <!-- メールアイコン -->

            <div class="home-sample-mailbtn">
                <!-- Right Side Of Navbar -->
                <ul class="home-navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="home-nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="home-nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="home-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
            <script src="{{ asset('../css/posts/script.js') }}"></script>
        </header>



        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
