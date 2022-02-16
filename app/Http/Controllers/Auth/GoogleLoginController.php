<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Socialite;
use App\User;
use Auth;


class GoogleLoginController extends Controller
{

    // socialite
    /**
     *  Googleの認証ページヘユーザーをリダイレクト
     *
     * @return \Illuminate\Http\Response
     */
    public function getGoogleAuth()
    {
        // return Socialite::driver('twitter')->redirect();
        return Socialite::driver('google')->redirect();
    }

    /**
     * Twitterからユーザー情報を取得
     * GitHubからユーザー情報を取得
     *
     * @return \Illuminate\Http\Response
     */
    public function authGoogleCallback()
    {
        // try catch文 処理でエラーが出たら途中でも作業を戻してエラーに飛ばす

        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            // dd($googleUser);
            // email が合致するユーザーを取得
            // $user = User::where('email', $googleUser->email)->first();
            $finduser = User::where('google_id', $googleUser->id)->first();
            // $googleUser->emailがDBに登録されていなければ、DBに$googleUserをユーザ情報として登録
            // $user = User::firstOrNew(['email' => $googleUser->email]);

        // dd($googleUser);

        if ($finduser) {
            Auth::login($finduser, true);
    
                return redirect()->route('home');
        } else {
            $newUser = User::create([
                'token'    => $googleUser->token,
                'name' => $googleUser->name,
                // 'email' => $googleUser->email,
                'google_id'=> $googleUser->id,
                'avatar'   => $googleUser->avatar,
                // 'password' => encrypt('123456dummy')
            ]);
// dd($newUser);
            Auth::login($newUser);
     
            return redirect()->route('home');
        }
        } catch (Exception $e) {
            return redirect()->route('login');
        }
        
        return redirect()->route('home');
    }

}
