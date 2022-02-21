<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo(User::class);
    }

    public function meeting()
    {   //reviewsテーブルとのリレーションを定義するreviewメソッド
        return $this->belongsTo(Meeting::class);
    }
}
