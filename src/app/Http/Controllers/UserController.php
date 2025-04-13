<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        Auth::login($user);

        return redirect()->route('register')->with('status', '登録が完了しました！');
    }
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(LoginRequest $request)
    {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // ログイン成功 → 遷移先はお好みで
        return redirect()->route('admin.index');
    }

    // ログイン失敗
    return back()->withErrors([
        'email' => 'メールアドレスまたはパスワードが正しくありません。',
    ])->withInput();
}

}