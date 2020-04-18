<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function new()
    {
        return view('users.new');
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|max:50',
           'email' => 'required|max:255|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }
}
