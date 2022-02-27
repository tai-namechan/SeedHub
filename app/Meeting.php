<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;

class Meeting extends Model
{
    // "fillable"はホワイトリストです。$fillableで指定したカラムは値が代入
    protected $fillable = [
        'id', 'user_id'
    ];

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    
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

}
