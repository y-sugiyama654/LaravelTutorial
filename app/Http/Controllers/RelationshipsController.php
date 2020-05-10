<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RelationshipsController extends Controller
{
    public function __construct()
    {
        $this->middleware('authenticate');
    }

    public function store(Request $request)
    {
        Auth::user()->follow($request->followed_id);
        return redirect()->route("users.show", Auth::id());
    }

    public function destroy($id)
    {
        Auth::user()->unfollow($id);
        return redirect()->route("users.show", Auth::id());
    }
}
