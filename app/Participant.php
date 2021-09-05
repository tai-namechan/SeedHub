<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    public function participants()
    {
        return $this->hasMany('App\Meeting');
    }
}
