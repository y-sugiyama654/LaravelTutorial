<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaticPagesController extends Controller
{
    /**
     * HOMEページの表示
     */
    public function home()
    {
        $feed_items = null;
        if (Auth::check()) {
            $feed_items = Auth::user()->microposts()->paginate(30);
        }
        return view('static_pages.home')->with("feed_items", $feed_items);
    }

    /**
     * HELPページの表示
     */
    public function help()
    {
        return view('static_pages.help');
    }

    /**
     * ABOUTページの表示
     */
    public function about()
    {
        return view('static_pages.about');
    }

    /**
     * CONTACTページの表示
     */
    public function contact()
    {
        return view('static_pages.contact');
    }

}
