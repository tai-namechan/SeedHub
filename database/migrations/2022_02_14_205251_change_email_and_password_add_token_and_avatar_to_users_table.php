<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeEmailAndPasswordAddTokenAndAvatarToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // tokenとavatarの追加
            // afterは描かないと既にあるテーブルの下に来ちゃう見た目の問題
            $table->string('token')->nullable()->after('name');
            $table->text('avatar')->nullable()->after('token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // callback?rollbackした際の処理
            $table->dropColumn('token');
            $table->dropColumn('avatar');
        });
    }
}
