<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountActivationsController extends Controller
{
    public function build()
    {
        return $this->from("noreply@example.com")
            ->subject("Account activation")
            ->view('emails.account_activations');
    }

    public function edit(Request $request, $token)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && !$user->activated && Hash::check($token, $user->activation_digest)) {
            $user->activated = true;
            $user->activated_at = Carbon::now();
            $user->save();
            Auth::login($user);
            session()->flash('message', ['success' => 'Account activated!']);
            return redirect()->route("users.show", $user->id);
        } else {
            session()->flash('message', ['danger' => 'Invalid activation link']);
            return redirect("/");
        }
    }
}
