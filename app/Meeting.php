<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;
class Meeting extends Model
{
    //
    public function Work_times()
    {
        return $this->hasMany('App\Meeting');
    }
    protected $dates =
    [
        'start_time',
        'end_time'
    ];

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    //後でViewで使う、いいねされているかを判定するメソッド。
    public function isLikedBy($user): bool {
        return Like::where('user_id', $user->id)->where('meeting_id', $this->id)->first() !==null;
    }
}
