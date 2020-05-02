<?php

namespace App\Http\Controllers;

use App\Mail\AccountActivation;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->middleware('authenticate')->only(["edit", "update"]);
        //$this->middleware('guest')->only(["index", "edit", "update", "destroy"]);
    }

    /**
     * ユーザー一覧ページの表示
     */
    public function index()
    {
        $user = User::paginate(30);
        return view("users.index")->with("users", $user);
    }

    /**
     * ユーザーの個別ページ表示
     *
     * @param int $id ユーザーID
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show')->with('user', $user);
    }

    /**
     * ユーザー作成ページの表示
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * ユーザーの保存処理
     *
     * @param Request $request リクエスト
     */
    public function store(Request $request)
    {
        // メールアドレスを小文字に変換
        $request->email = mb_strtolower($request->email);

        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|confirmed|min:6',
            "password_confirmation" => "required|min:6"
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $activation_token = str_random(22);
        $user->activation_digest = bcrypt($activation_token);
        $user->save();
        Auth::login($user);
        session()->flash("message", ['success' => 'Welcome to the Sample App!']);
        Mail::to($user)->send(new AccountActivation($user, $activation_token));
        return redirect()->route("users.show", $user);
    }

    /**
     * ユーザーの編集ページ表示
     *
     * @param $id ユーザーID
     */
    public function edit($id)
    {
        return view('users.edit', ['user' => User::find($id)]);
    }

    public function update(Request $request, $id)
    {
        // メールアドレスを小文字に変換
        $request->email = mb_strtolower($request->email);

        $request->validate([
            'name' => 'required|max:50',
            'email' => ['required', 'max:255', 'email', Rule::unique('users')->ignore(Auth::id())],
            'password' => 'required|confirmed|min:6',
            "password_confirmation" => "required|min:6"
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        $user->save();
        session()->flash("message", ['success' => 'Profile updated']);
        return redirect()->route("users.show", $user->id);
    }

    /**
     * ユーザーの削除処理
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        User::destroy($id);
        session()->flash("message", ["success" => "User deleted"]);
        return redirect()->route("users.index");
    }
}
