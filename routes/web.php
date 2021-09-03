<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 投稿一覧ページ
Route::get('/posts', 'PostController@index')->name('posts.index');

Route::get('/sample', function () {
    return view('sample');
});

// 新規登録ページ
Route::get('/create', 'PostController@create')->name('posts.create');

Route::post('/store', 'PostController@store')->name('posts.store');