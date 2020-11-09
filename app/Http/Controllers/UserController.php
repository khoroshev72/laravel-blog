<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('front.user.create');
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);
        session()->flash('success', 'Пользователь зарегистрирован');
        return redirect()->route('home');
    }

    public function loginForm()
    {
        return view('front.user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            session()->flash('success', 'Вы успешно авторизировались');
            return redirect()->home();
        }
        return redirect()->back()->with('danger', 'Неверный логин или пароль');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
