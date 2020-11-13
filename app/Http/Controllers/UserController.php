<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
        $hash = Str::random(100);
        $user->remember_token = $hash;
        $user->save();
        Mail::to($request->email)->send(new VerifyEmail($user));
        session()->flash('success', 'На вашу почту было отправлно письмо. Для подтверждения Email проверьте почту и кликните по узказанной ссылке.');
        return redirect()->home();
    }

    public function verify($email, $hash)
    {
        $user = User::where('email', $email)->first();
        if ($user && $user->remember_token === $hash){
            $user->email_verified_at = now();
            $user->remember_token = null;
            $user->save();
            Auth::login($user);
            return redirect()->route('home')->with('success','Регистрация завершена');
        }
        abort(404);
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
        $user = User::where('email', $request->email)->first();
        if ($user->email_verified_at){
            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])) {
                session()->flash('success', 'Вы успешно авторизировались');
                return redirect()->home();
            }
        }
        return redirect()->back()->with('danger', 'Неверный логин или пароль');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
