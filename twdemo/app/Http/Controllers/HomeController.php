<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;  //useはこのクラスのファイルを使いますよってこと
use Illuminate\Support\Facades\Auth;
use App\Tweet;


class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
   }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //ログインしているユーザーを取得
        $my_tweets = Tweet::getTLTweet();//タイムラインのツイートをTweetが取ってくる
//dd($my_tweets);
        //$user_id = Auth::id();  //idをuserにするとuserじょうほうを丸っと持ってくる

        //$user_id = Auth::user->id();//ログインしているユーザーのiDをとってくる

        // $user = Auth::user();
       // dd($user->id);
       //上二つと一緒の意味      こっちの方が処理が早い

        //dd($user_id);
        //tweetsテーブルの中のuser_idの値が取得したユーザーのIDのものを全て取得する

        // $my_tweets = Tweet::where('user_id',$user->id)->get();
        //whereは    どこの値が   なにを取ってくるか   という順 ()のなかの読み方。
        //dd($my_tweets);


        // Tweet::all();


        return view('home',['tweets'=>$my_tweets]);       //view の　home.bladeにいく

    }



}
