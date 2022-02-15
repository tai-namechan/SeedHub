@extends('layouts.app')

@section('content')

<body class="login-body">
    <div class="login-wrapper">
        <form class="login" method="POST" action="{{ route('login') }}">
            @csrf
            <p class="title">ログインフォーム</p>
            <div class="form-group row">
                <label for="email" class="register-title col-md-4 col-form-label text-md-right">メールアドレス</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="register-title col-md-4 col-form-label text-md-right">パスワード</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="register-title form-check-label" for="remember">
                            パスワード保存
                        </label>
                    </div>
                    <div class="register-title forget-pass">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            ? パスワードを忘れた場合はこちら
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <button type="submit" class="post-btn">
                ログイン
            </button>
        </form>
        <hr>

        <p class="socialite-title">SNSアカウントでログイン</p>
        
        <a  class="socialite-btn btn-github" href="{{ url('login/github')}}">
            <i class="fa fa-github"> <span> Sign in with GitHub</span></i>
        </a>
        <a class="socialite-btn btn-twitter" href="">
            <i class="fa fa-twitter"> <span>Sign in with Twitter</span> </i> 
        </a>
        <a class="socialite-btn btn-facebook" href="">
            <i class="fa fa-facebook"> <span>Sign in with Facebook</span> </i>
        </a>
        <a class="socialite-btn btn-google" href="">
            <i class="fa fa-google"> <span>Sign in with Google</span></i>
        </a>
    </div>

</body>
@endsection
