<?php

namespace App\Http\Controllers;

use App\Mail\PasswordReset;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PasswordResetsController extends Controller
{
    /**
     * PasswordResetsController constructor.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = User::where("email", $request->email)->first();
            if ($user->checkExpiration()) {
                session()->flash('message', ['danger' => 'Password reset has expired']);
                return redirect()->back();
            }
            return $next($request);
        })->only(["edit", "update"]);
    }

    /**
     * パスワード再設定用ページの表示
     */
    public function create()
    {
        return view('password_resets.create');
    }

    /**
     * パスワード再設定用の処理
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $resetToken = str_random(22);
            $user->reset_digest = bcrypt($resetToken);
            $user->reset_sent_at = Carbon::now();
            $user->save();
            $user->sendPasswordResetMail($resetToken);
            session()->flash('message', ['info' => 'Email sent with password reset instructions']);
            return redirect("/home");
        } else {
            session()->flash('message', ['danger' => 'Email address not found']);
            return redirect()->back();
        }
    }

    /**
     * パスワード更新ページの表示
     *
     * @param Request $request
     */
    public function edit(Request $request)
    {
        $user = User::where("email", $request->email)->first();

        return view("password_resets.edit")->with(["user" => $user, "token" => $request->password_reset]);
    }

    /**
     * パスワード更新処理
     *
     * @param Request $request
     */
    public function update(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

        $user = User::where("email", $request->email)->first();
        $user->password = bcrypt($request->password);
        $user->reset_digest = null;
        $user->save();
        Auth::login($user);
        session()->flash('message', ['success' => 'Password has been reset.']);
        return redirect()->route("users.show", $user->id);
    }
}
