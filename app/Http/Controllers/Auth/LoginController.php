<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
        // ログイン後のリダイレクトをTopページに
        public function redirectPath()
        {
            return '/';
        }

    // socialite
    /**
     * Twitterの認証ページヘユーザーをリダイレクト
     *  GitHubの認証ページヘユーザーをリダイレクト
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        // return Socialite::driver('twitter')->redirect();
        return Socialite::driver('github')->redirect();
    }

    /**
     * Twitterからユーザー情報を取得
     * GitHubからユーザー情報を取得
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
       
        // $user = Socialite::driver('github')->stateless()->user();
        // dd($user);

        // try catch文 処理でエラーが出たら途中でも作業を戻してエラーに飛ばす

        try {
            $user = Socialite::driver('github')->stateless()->user();
            // $user = Socialite::driver('twitter')->stateless()->user();
        // dd($user);

        if ($user->getName()) {
            $userName = $user->getName();
        } else {
            $userName = $user->getNickName();
        }
        // dd($userName);
            $socialUser = User::firstOrCreate([
                'token'    => $user->token,
            ], [
                'token'    => $user->token,
                'name'     => $userName,
                // 'email'    => $user->email,
                'avatar'   => $user->avatar,
            ]);
            // userインスタンスによる認証、指定したユーザーでログインし、rememberにする
            // dd($socialUser);
            Auth::login($socialUser, true);
        } catch (Exception $e) {
            return redirect()->route('login');
        }
        
        return redirect()->route('home');
    }


}
