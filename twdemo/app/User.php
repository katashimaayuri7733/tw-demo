<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use App\Auth;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable//Userはモデル名
{
    use Notifiable;

    protected $table = 'users';
    protected $guarded = ['id'];//指定しなくてもいいカラムはguardedにいれる

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [          //自分でいじりたいテーブル
    'name', 'email','password'
];

public static function getTLUser(){
        // $users = User::all();
        // return $users;
        //これだと自分も一覧に乗ることになる（自分をフォローすることはない）

        //自分のuser_idだけ省きたい
    $where = [
        ['users.id','<>',Auth::id()],//users.idログインユーザーのid     <>以外の   Auth::id   idを持ってくる
    ];  //Auth はログインしているもの

    $users = User::where($where)->get();


    $test = User::find(4);//usersテーブルのid（指定）をみつける
    //dd($test->follows);

    return $users;
}

public function follows()
{
    return $this->hasMany('App\Follow','follow_id','id');//$this はインスタンス化された　　自分
    //usersのid（第3引数）をfollow_id（第二引数）にひも付けたい

}

public function unfollws()
{
    return $this->hasMany('App\Follow','follow_id','id');
}
}



//モデル完成！