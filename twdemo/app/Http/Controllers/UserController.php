<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('users.create');
    }


    public function index()
    {
      //dd("index");

      $userData = User::all();//modelのデータをすべてひっぱってきた
      //dd($userData);//ddはreturnの上に置く。returnはfunctionの終わりをしめしているから。
      return view('users.index',['test'=>$userData]);

    }

    public function edit(Request $request,$id)
    {
      $user = User::FindOrFail($id);
      //dd($user);
      return view('users/edit',['user'=>$user]);

//dd($id);
    }
    public function update(Request $request)
    {
      //dd('ここはupdate');

      //更新データ設定
      $updateData = [
        'name'=>$request->name,
        'email'=>$request->email,
      ];


      User::where('id',$request->id)->get();

      //これだと全ユーザーのデータが更新される
      //User::all()->update($updateData);


      //データ更新
      User::where('id',$request->id)
      ->update($updateData);

      return redirect("/");//rediは一覧に戻らせる

    }


    //public function delete($id)
    //{
      //データ削除
      //User::destroy($id);

      //return redirect("/");

    //}


    public function delete(Request $request)
    {
      //dd($request->id);
      //データ削除
      User::destroy($request->id);

      return redirect("/");

   }

   public function copy(Request $request)
    {
      $user = User::find($request->id);
      dd($user);
      return view('users/',['user'=>$user]);

    }




   public function store(Request $request)
   {
     //データを登録する(create)

//dd($request);     ddが$requestにどんなリクエストがきているか確認できる

     $hassyadaiUser = new User;
     $hassyadaiUser->name = $request->name;
     $hassyadaiUser->email = $request->email;
     $hassyadaiUser->save();

     return redirect("/");

      // $params = $request->validate([//reqはブラウザから//valはnameやemailの数があっているか確認
      //   'name' => 'required|max:300',
      //   'email' => 'required|max:300',
      // ]);

      // User::create($params);

   }


 }