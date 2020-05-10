<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionsController extends Controller
{
    /**
     * ログインページの表示
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * ログイン処理
     *
     * @param Request $request リクエスト
     */
    public function store(Request $request)
    {
        $user = User::where('email', strtolower($request->email))->first();

        if ($user && Hash::check($request->password, $user->password)) {
            if ($user->activated === 1) {
                Auth::login($user, $request->remember_me === "1");
                return redirect()->route('users.show', $user);
            } else {
                session()->flash('message', ['warning' => 'Account not activated. Check your email for the activation link.']);
                return redirect("/home");
            }
        } else {
            session()->flash('message', ['danger' => 'Invalid email/password combination']);
            return back()->withInput();
        }
    }

    /**
     * ログアウト処理
     */
    public function destroy()
    {
        Auth::logout();
        return redirect("/home");
    }
}
