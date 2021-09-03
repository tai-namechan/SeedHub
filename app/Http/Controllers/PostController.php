<?php

namespace App\Http\Controllers;
// 送信されてきた値をRequestでキャッチ
use Illuminate\Http\Request;
// データベースに接続するのに必要なコード
// ModelのことAppの中にあるPostもモデルを使う
use App\Post;
use Auth;
use App\Meeting;

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
        // $posts = Post::all();

        // 表示件数を制限する
        // $posts = Post::paginate(10);
        // 最新順に並び替える
        // $posts = Post::latest()->get();

        // デバックdd($posts); Laravelのvar_dump

        // postsフォルダの中のindexというviewファイルにviewpostsとしてデータを渡す
        // return view('posts.index', ['viewpost' =>$posts]);
        return view('posts.index');
    }
}
