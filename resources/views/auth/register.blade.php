@extends('layouts.app')

@section('content')

<body class="register-body">
    <div class="register-wrapper">
        <form class="login" method="POST" action="{{ route('register') }}">
            @csrf
            <p class="title register-title">新規登録フォーム</p>

            <div class="form-group row">
                <label for="name" class="register-title col-md-4 col-form-label text-md-right">ニックネーム</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="email" class="register-title col-md-4 col-form-label text-md-right ___class_+?31___">メールアドレス</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>
            <div class="form-group row">
                <label for="password" class="register-title col-md-4 col-form-label text-md-right ___class_+?36___">パスワード</label>

                <div class=" col-md-6 ___class_+?37___">
                    <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="register-title col-md-4 col-form-label text-md-right ___class_+?41___">確認用 パスワード</label>

                <div class=" col-md-6 ___class_+?42___">
                    <input id="password-confirm" type="password" class=" form-control ___class_+?43___" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <button type="submit" class="post-btn">登録</button>
        </form>

        <p class="socialite-title">SNSアカウントでログイン</p>
        
        <a  class="socialite-btn btn-github" href="{{ url('login/github')}}">
            <i class="fa fa-github"> <span> Sign in with GitHub</span></i>
        </a>
        <a class="socialite-btn btn-twitter" href="{{ url('login/twitter')}">
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
