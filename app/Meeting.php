<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
