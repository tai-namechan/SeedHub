<?php

namespace App\Http\Controllers;
// 送信されてきた値をRequestでキャッチ
use Illuminate\Http\Request;
// データベースに接続するのに必要なコード
// ModelのことAppの中にあるPostもモデルを使う
use App\Meeting;
use Auth;

class PostController extends Controller
{
    function index()
    {
        // ログインしていないユーザーは登録ページに飛ぶ
        if( Auth::id() == null){
        return redirect('/register');
        }


        $meetings = Meeting::all();
        // dd($meetings);
        return view('posts.index', ['meetings'=>$meetings]);

        // if( Auth::id() == null){
        //     return redirect('/home');
        // }
        // indexメソッド一覧表示機能を作るメソッド
        // データベースにあるpostsデータを取ってきて
        // posts/index.blade.phpで渡す

        // postテーブルからid1のデータを取ってきている
        // $user = Post::find(1);
        // $user = Post::first()->user->name;
        // dd($user);

        // ログインしたuserの投稿のみを表示する
        // チーム開発ならマイページで使う

        // Authログインしたuserユーザーが持っているposts投稿一覧
        // $posts = Auth::user()->posts;

        // ログインしたuserじゃないならユーザーのidを入れればいいだけ
        // $posts = User::find(1)->posts;
        // dd($posts);
        // エロクエント
        // ＄〇〇 = Postテーブルから::all(全部)
        
        // 表示件数を制限する
        // $posts = Post::paginate(10);
        // 最新順に並び替える
        // $posts = Post::latest()->get();

        // デバックdd($posts); Laravelのvar_dump

        // postsフォルダの中のindexというviewファイルにviewpostsとしてデータを渡す
        // return view('posts.index', ['viewpost' =>$posts]);
        
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $login_user_id = Auth::id();
        // dd($login_user_id);

        $meeting_info = new Meeting;
        $meeting_info->name = $request->meeting;
        $meeting_info->start_time = $request->starttime;
        $meeting_info->end_time = $request->endtime;
        $meeting_info->detail = $request->detail;
        $meeting_info->url = $request->url;
        $meeting_info->category_id = $request->category;
        $meeting_info->user_id = $login_user_id;
        $meeting_info->timezone_id = 1;

        $meeting_info->save();
        
        // リダイレクト処理
        return redirect('/');
    }

    // 渡ってきたidが引数に入る
    function show($id)
    {
        // idで一件だけ取得するときfindでとる
        $post = Meeting::find($id);
    
        // 他のカラムでデータを取るとき
        // $post = Where::等
        return view('posts.show', ['post' => $post]);
    }
}
