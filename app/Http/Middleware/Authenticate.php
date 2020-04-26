<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next)
    {
        // ログインしていない場合はログインページにリダイレクト
        if (!Auth::check()) {
            session()->flash('message', ['danger' => 'Please login.']);
            session(["url.intended" => url()->current()]);
            return redirect(route('login'));
        }

        // ログインユーザーとは違うユーザーの保護ページにアクセスした場合
//        if ($request->user != Auth::id()) {
//            session()->flash('message', ['danger' => 'You do not have access authorization.']);
//            return redirect()->back();
//        }

        return $next($request);
    }
}
