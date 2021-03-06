<?php

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


//index  トップページなどを作る時に使う方が綺麗　　　インデックスの意味を調べればわかる
Auth::routes();
//トップページ
// Homeコントローラー
Route::get('/','HomeController@index');

// //ツイート保存
// Tweetコントローラー
Route::post('/tweet','TweetController@update');

// // ユーザー一覧
// Userコントローラー
Route::get('/users', 'UserController@index')->name('user_list');

// // フォローを実行する
// Userコントローラー
Route::post('/users/follow','UserController@follow');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/unfollow','UserController@unfollow');

Route::post('/tweet/delete','TweetController@tweetsdelete');





