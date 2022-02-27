<?php

namespace App\Http\Controllers;
// 送信されてきた値をRequestでキャッチ
use Illuminate\Http\Request;
// データベースに接続するのに必要なコード
// ModelのことAppの中にあるPostもモデルを使う
use App\Meeting;
use Auth;
use App\Calendar\CalendarView;
// Validatorファザードを使用するのでValidatorをuseする
use Illuminate\Support\Facades\Validator;



class PostController extends Controller
{
    function showCalender()
    {
        $calendar = new CalendarView(time());

        return view('posts.calendar', [
            "calendar" => $calendar,
        ]);
    }

    function index(Meeting $meeting)
    {
        // ログインしていないユーザーは登録ページに飛ぶ
        if (Auth::id() == null) {
            return redirect('/register');
        }

        $meetings = Meeting::all();
        // dd($meetings);
        $calendar = new CalendarView(time());


                // いいね機能
        // ユーザーがいいねをしたかの判定
        $meetings->load('likes');
        // $meetings = $meetings->toArray();
        // $sort = [];
        // foreach ($meetings as $key => $meeting) {
        //     $sort[$key] = $meeting['likes'];
        // }
        // dd($sort[$key]);

        $user = Auth::user();

        $defaultCount = count($meeting->likes);
        // dd($defaultCount);
        $defaultLiked = $meeting->likes->where('user_id', $user->id)->first();

        if($defaultLiked == null) {
            $defaultLiked == false;
        } else {
            $defaultLiked == true;
        }


        // いいね数をindexに表示する
        // withCount()は先ほど説明した通りです。これをitemsでビューに返して、ビューは{{$items->likes_count}}で投稿ごとにいいね数を取得、表示することができます
        // orderBy()は指定した順番でレコードを取得するメソッド。第一パラメータは並べ替えの基準となるフィールドを選択、第二パラメータはソートする方法（昇順asc=小さい順、降順desc=大きい順）を指定します
        // paginateはレコードが多い場合に、１ページごとの表示数を指定するメソッドです
        // $meetings = Meeting::withCount('likes')->orderBy('id', 'desc')->paginate(10);
        
        return view('posts.index', ['meetings' => $meetings, "calendar" => $calendar,'meeting' => $meeting, 'userAuth' => $user,'defaultLiked' => $defaultLiked, 'defaultCount' => $defaultCount]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([       // <-- ここがバリデーション部分
            'meeting' => 'required',
            'starttime' => 'required',
            'endtime' => 'required',
            'detail' => 'required',
            'url' => 'required',
            'category' => 'required',
            'timezone' => 'required',
        ]);

        $login_user_id = Auth::id();
        // dd($login_user_id);

        $meeting_info = new Meeting;
        $meeting_info->name = $request->meeting;
        $meeting_info->start_time = $request->starttime;
        $meeting_info->end_time = $request->endtime;
        $meeting_info->detail = $request->detail;
        $meeting_info->url = $request->url;
        $meeting_info->category_id = $request->category;
        $meeting_info->timezone_id = $request->timezone;
        $meeting_info->user_id = $login_user_id;
        // $meeting_info->timezone_id = 1;

        $meeting_info->save();

        // リダイレクト処理
        return redirect('/');
    }

    // 渡ってきたidが引数に入る
    function show($id)
    {
        // idで一件だけ取得するときfindでとる
        $post = Meeting::find($id);
        // dd($post);
        // 他のカラムでデータを取るとき
        // $post = Where::等


        return view('posts.show', ['post' => $post]);
    }

    // 検索機能
    public function search(Request $request)
    {
        $category_number = $request->category;
        $timezone_number = $request->timezone;

        if ($category_number == "0" || $timezone_number == "0") {
            $meetings = Meeting::where('timezone_id', $timezone_number)->orWhere('category_id', $category_number)->get();
        } else {
            $meetings = Meeting::where('category_id', $category_number)->where('timezone_id', $timezone_number)->get();
        }

        return view('posts.index', ['meetings' => $meetings]);
    }

    public function reset()
    {
        $meetings = Meeting::all();
        // dd($meetings);
        return view('posts.index', ['meetings' => $meetings]);
    }

    // いいね機能

}
