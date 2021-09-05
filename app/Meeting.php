<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    //
    public function meeting()
    {
        return $this->belongsTo('App\Participant');
    }
    protected $dates =
    [
        'start_time',
        'end_time'
    ];
}
