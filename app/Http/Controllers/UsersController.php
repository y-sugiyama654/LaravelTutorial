<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show')->with('user', $user);
    }

    public function new()
    {
        return view('users.new');
    }

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
        session()->flash("message", ['success' => 'Welcome to the Sample App!']);
        return redirect()->route("users.show", $user);
    }
}
