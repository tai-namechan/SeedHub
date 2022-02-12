<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profile;
use App\Participant;
use App\Calendar\CalendarView;
use Auth;

class ProfileController extends Controller
{
    function index()
    {
        // ログインしていないユーザーは登録ページに飛ぶ
        if( Auth::id() == null){
        return redirect('/register');
        }

        $login_user_id = Auth::id();
        $profiles = Auth::user()->profiles;
        $userdata = Auth::user();
        // $profile = $profiles[0]->user_id;
        // dd($profiles);
        // dd($userdata);

        // 草生やすためのもの
        $calendar = new CalendarView(time());
        // dd($calendar);

        return view('users.mypage', ['sendprofiles'=>$profiles, "calendar" => $calendar, 'senduserdata'=> $userdata, ]);
    }


    public function create()
    {
        return view('users.profile_create');
    }


    public function store(Request $request)
    {
        $request->validate([       // <-- ここがバリデーション部分
            'introduction' => 'required',
        ]);


        $login_user_id = Auth::id();
        // dd($login_user_id);

        $profile_info = new Profile;
        $profile_info->id = $request->id;
        // $profile_info->image = $request->iamge;
        $profile_info->introduction = $request->introduction;
        // $profile_info->created_at = $request->created_at;
        $profile_info->user_id = $login_user_id;

    //   dd($profile_info);
        // $image = $request->file('image');
        // // file()で受け取る
        // if($request->hasFile('image')&& $image->isValid()){
        //     $image_name = $image->getClientOriginalName();
        //     $profile_info -> image = $image->storeAs('public/images', $image_name);
        // }

        $profile_info->save();

        // リダイレクト処理
        return redirect('/mypages');
    }

    // 渡ってきたidが引数に入る
    function show($id)
    {

    }

    public function mypage(){
        $profiles = Auth::user()->profiles;
        $userdata = Auth::user();
        // $profile = $profiles[0]->user_id;
        // dd($profiles);
    }
}
