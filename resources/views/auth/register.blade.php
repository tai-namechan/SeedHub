@extends('layouts.app')

@section('content')
 
    <body class="register-body">
        <div class="register-wrapper">
            <form class="login" method="POST" action="{{ route('register') }}">
                @csrf
                <p class="title">{{ __('Register') }}</p>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="email" class=" col-md-4 col-form-label text-md-right ___class_+?31___">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="form-group row">
                    <label for="password" class=" col-md-4 col-form-label text-md-right ___class_+?36___">{{ __('Password') }}</label>

                    <div class=" col-md-6 ___class_+?37___">
                        <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class=" col-md-4 col-form-label text-md-right ___class_+?41___">{{ __('Confirm Password') }}</label>

                    <div class=" col-md-6 ___class_+?42___">
                        <input id="password-confirm" type="password" class=" form-control ___class_+?43___" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>

                <button type="submit" class="post-btn">{{ __('Register') }}</button>
            </form>

        </div>
    </body>
@endsection
