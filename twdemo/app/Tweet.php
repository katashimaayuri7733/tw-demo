<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth; //Authを使いますよ宣言をuseでおこなう
use App\User;

class Tweet extends Model
{
  public static function getTLTweet(){
//目標
    //ログインしているユーザーのつぶやきと、フォローユーザーのつぶやきを取得
// 自分のつぶやきを取得するには？
//1ログインしているユーザーの情報を取得
    $user = Auth::user();


    // フォローしているユーザーのつぶやきを取得するには？
//2フォローテーブルから、ログインしているユーザーがフォローしているユーザーidを取得する
    $follow_list = Follow::where('user_id',$user->id)->get();
    //return $follow_list;

    // [
    //   ['id'=>1,'user_id'=>2,'follow_id' => 1],
    //   ['id'=>2,'user_id'=>2,'follow_id' => 4]
    // ]

//3 whereInで使える用の配列を準備する
    $user_id_list = [];
    $user_id_list[] = $user->id;

    foreach ($follow_list as $key => $value){
      $user_id_list[] = $value->follow_id;
    }

//４ツイートテーブルの中のuser_idの値が、手順３で作成した配列をつかってuser_idが配列の中身のものを含むものを全て取得する
    $tweets = Tweet::whereIn('user_id',$user_id_list)->get();
    return $tweets;
    //結果は($user_id_list[] = $user->id;なしバージョン)     1ループ目 1
  //          ２ループ目 4
  //結果は（ありバージョン）
      // ループ1[2,1]  ログインしているユーザーidとフォローされたユーザーidのみとってきてる
      // ループ２[2,1,4]

    // //ログインしているユーザーの情報を取得
    // $user=Auth::user();
    // //tweetsテーブルの中のuser_idが取得したユーザーのIDのものを全て取得する
     //$my_tweets = Tweet::where('user_id',$user->id)->get();
     //return $my_tweets;//ログインしているユーザーのツイート情報を返却
  }

  public function users()
  {
    return $this->belongsTo('App\User','user_id','id');
  }

}
