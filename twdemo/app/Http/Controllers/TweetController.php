<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \App\Tweet;//どこのどのTweet?というようにならないようにここでTweet.phpですよーと指定してあげる

class TweetController extends Controller
{
  public function __construct()//constは強制的に一番最初に実行する
  //まずログインをさきにしたい
  {
    $this->Tweet = new \App\Tweet;
  }
  public function update(Request $request)
  {
    $id = Auth::id();

//insert
    // $tweetEntity = [
    //   'users_id' => $id,
    //   'tweet' => $request->input('tweet'),
    // ];

// //DBへ登録     いったん保留（id文・）
// if(!$this->Tweet->tweetUpdateOrCreate($tweetEntity)){
//   $request->session()->flash('message','ツイート時にエラーが発生')
// }

    $tweet = new Tweet;
    //saveメソッドを使うためにインスタンス化する
    $tweet->user_id = Auth::id();//ログインしている人のI.D.
    $tweet->tweet = $request->input('tweet');//inputは書き方
     //$req->tweet;でもおk
    $tweet->save();

    return redirect()->route('home');
//     Tweet::all();  //テーブルの情報を全て持ってくる　　ここでのテーブルはTweet
  }
}



