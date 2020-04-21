<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * ユーザーの個別ページ表示
     *
     * @param int $id ユーザーID
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show')->with('user', $user);
    }

    /**
     * ユーザー作成ページの表示
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * ユーザーの保存処理
     *
     * @param Request $request リクエスト
     */
    public function store(Request $request)
    {
        // メールアドレスを小文字に変換
        $request->email = mb_strtolower($request->email);

        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|confirmed|min:6',
            "password_confirmation" => "required|min:6"
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        Auth::login($user);
        session()->flash("message", ['success' => 'Welcome to the Sample App!']);
        return redirect()->route("users.show", $user);
    }
}
