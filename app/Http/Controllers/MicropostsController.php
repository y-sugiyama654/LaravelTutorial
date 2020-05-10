<?php

namespace App\Http\Controllers;

use App\Micropost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MicropostsController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $micropost = Auth::user()->microposts()->where("id", $request->micropost);
            if ($micropost->count() === 0) {
                return redirect("/home");
            }
            return $next($request);
        })->only(["destroy"]);
    }

    /**
     * マイクロポストの保存処理
     *
     * @param Request $request
     * @return
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:140'
        ]);

        $micropost = new Micropost;
        $micropost->content = $request->content;

        if ($request->hasFile('picture')) {
            $file = $request->picture;
            $path = "micropost_proto/" . $file->hashName();
            $encode_file = Image::make($file)->encode();
            Storage::put($path, (string) $encode_file, "public");
            $micropost->picture = $path;
        }

        Auth::user()->microposts()->save($micropost);
        session()->flash('message', ['success' => 'Micropost created!']);
        return redirect("/home");
    }

    /**
     * マイクロポストの削除処理
     *
     * @param $id マイクロポストID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Micropost::find($id)->delete();
        session()->flash('message', ['success' => 'Micropost deleted']);
        return back();
    }
}
