<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'name', 'email',
    ];
}



//モデル完成！