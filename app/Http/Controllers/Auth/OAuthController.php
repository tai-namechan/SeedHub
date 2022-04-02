<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Socialite;

class OAuthController extends Controller
{
   /**
     * 各SNSのOAuth認証画面にリダイレクトして認証
     * @param string $provider サービス名
     * @return mixed
     */
    public function socialOAuth(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * 各サイトからのコールバック
     * @param string $provider サービス名
     * @return mixed
     */
    public function handleProviderCallback($provider)
    {
 
        try {
            $googleUser = Socialite::driver($provider)->stateless()->user();
            // dd($googleUser);
            // email が合致するユーザーを取得
            // $user = User::where('email', $googleUser->email)->first();
            $finduser = User::where('provider_id', $googleUser->id)->first();
            // $googleUser->emailがDBに登録されていなければ、DBに$googleUserをユーザ情報として登録
            // $user = User::firstOrNew(['email' => $googleUser->email]);

        // dd($googleUser);

        if ($finduser) {
            Auth::login($finduser, true);
    
                return redirect()->route('home');
        } else {
            $newUser = User::create([
                // 'token'    => $googleUser->token,
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                
                // 'avatar'   => $googleUser->avatar,
                // 'password' => encrypt('123456dummy')
            ]);
            $newUser->provider_name = $provider;
            $newUser->provider_id = $googleUser->id;
            $newUser->save();
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
