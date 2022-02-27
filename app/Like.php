<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    // "fillable"はホワイトリストです。$fillableで指定したカラムは値が代入
    protected $fillable = [
        'id','meeting_id','user_id'
   ];



   public function meeting()
   {
       return $this->belongsTo(App\Meeting::class, 'meeting_id', 'id');
   }

   public function user()
   {
       return $this->belongsTo(App\User::class, 'user_id', 'id');
   }
}
