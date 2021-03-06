<?php

namespace App\Http\Controllers;
//namespace  場所を表す

use Illuminate\Http\Request;//Illuminate\Httpパッケージ内にあるrequestが使える状態
use App\User;
use App\Follow;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function index(){
    $my_user = User::getTLUser();

    $login_user = User::find(Auth::id());

//dd('きのみ');
    //ユーザーidをログインユーザー以外全員取ってきたい

    // 「followsテーブルのuser_idカラムにログインユーザーのidが入ってるやつ」
    // 「かつ、follow_idに何かしら値が入ってるやつ」
    // があれば1を返す
    $follow_list = [];
    foreach ($login_user->follows as $value) {
      $follow_list[ $value->follow_id ] = '1';
      }
      return view('user.list',['users'=>$my_user,'follow_list'=>$follow_list]);
      # code...

   }

  public function follow(Request $request) {
    //user_idがfollow_idをフォローする

    //followsにデータをCreateする
    $follow = new Follow;//saveメソッドを使うためにインスタンス化する//新しいレコードが作られる
    $follow->user_id = Auth::id();  //follows.user_id が欲しい
    $follow->follow_id = $request->input('followId'); //follow_id が欲しい
    //$req->tweet;でもおっけー
    $follow->save();

    //ユーザー一覧にリダイレクト
    return redirect()->route('user_list');

  }


  public function unfollow(Request $request){
    //(Request $request)はformで送られてきた情報を$requestをつかうことによって扱えるようにする。

    $unfollow = Follow::where('user_id',Auth::id())->where('follow_id',$request->followId);
    $unfollow->delete();

//Follw
    //第二  ログインユーザーid                     第二  フォローユーザーのid

    return redirect()->route('user_list');

  }

}