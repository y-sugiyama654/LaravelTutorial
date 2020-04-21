<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    /**
     * HOMEページの表示
     */
    public function home()
    {
        return view('staticPages.home');
    }

    /**
     * HELPページの表示
     */
    public function help()
    {
        return view('staticPages.help');
    }

    /**
     * ABOUTページの表示
     */
    public function about()
    {
        return view('staticPages.about');
    }

    /**
     * CONTACTページの表示
     */
    public function contact()
    {
        return view('staticPages.contact');
    }

}
