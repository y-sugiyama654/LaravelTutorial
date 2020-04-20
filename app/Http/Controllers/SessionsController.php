<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $user = User::where('email', strtolower($request->email))->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('users.show', $user);
        } else {
            session()->flash('message', ['danger' => 'Invalid email/password combination']);
            return back()->withInput();
        }
    }

    public function destroy()
    {
        Auth::logout();
        return redirect("/");
    }
}
