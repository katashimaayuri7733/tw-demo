<?php

namespace App\Http\Controllers;
//namespace  場所を表す

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
  public function index(){
    $my_user = User::getTLUser();
    return view('user.list',['users'=>$my_user]);

//dd('お腹すいた');
    //ユーザーidをログインユーザー以外全員取ってきたい
  }

  public function follow(Request $request) {
    //user_idがfollow_idをフォローする

    //followsにデータをCreateする
    $follow = new Follow;//saveメソッドを使うためにインスタンス化する
    $follow->user_id = Auth::id();  //follows.user_id が欲しい
    $follow->follow_id = $request->input('followId'); //follow_id が欲しい
    //$req->tweet;でもおっけー
    $follow->save();


    //ユーザー一覧にリダイレクト
    return redirect()->route('user_list');

  }

}