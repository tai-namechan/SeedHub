<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
             //usersテーブルの外部キー設定
             //userテーブルのidカラムを参照するconstrainedメソッド
              //削除時のオプション
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
             //同じことをmeetingsテーブルとも
            $table->foreignId('meeting_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
