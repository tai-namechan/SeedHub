<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meeting;//投稿機能のモデル
use App\Like;
use Auth;

class LikeController extends Controller
{
    //コンポーネント初期読み込み時(created)に呼び出される
    public function like( Meeting $meeting, Request $request) {
        
      $like = Like::create(['meeting_id' => $meeting->id, 'user_id' => $request->user_id]);

      $likeCount = count(Like::where('meeting_id', $meeting->id)->get());

        return response()->json(['likeCount' => $likeCount]);
    }
    
    public function unlike(Meeting $meeting, Request $request)
    {
      $like = Like::where('user_id', $request->user_id)->where('meeting_id', $meeting->id)->first();
      $like->delete();

      $likeCount = count(Like::where('meeting_id', $meeting->id)->get());

      return response()->json(['likeCount' => $likeCount]);
    }
  //いいねボタンを押した時に呼び出される
//   public function check($meeting) {
//     $user = Auth::user();
//     $likes = new Like();
//     $like = Like::where('meeting_id',$meeting)->where('user_id',$user->id)->first();
//     if($like->like == 1) {
//          $like->like = 0;
//          $like->save();
//          $count = $likes->where('meeting_id',$meeting)->where('like',1)->count();
//          return [$like->like,$count];
//     } else {
//          $like->like = 1;
//          $like->save();
//          $count = $likes->where('meeting_id',$meeting)->where('like',1)->count();
//          return [$like->like,$count];
//     };
//    }
}
