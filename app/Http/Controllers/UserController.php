<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\PasswordReset;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    //Восстановления пароля,  форма восстановления
    public function password_reset(Request $request)
    {
        if (!empty($_POST)){
            $request->validate([
                'email' => 'required|email|exists:users,email'
            ]);
            $id = DB::table('password_resets')->insertGetId(['token' => Str::random(100), 'email' => $request->email, 'created_at' => now()]);
            $item = DB::table('password_resets')->find($id);
            Mail::to($request->email)->send(new PasswordReset($item));
            return redirect('/password_reset')->with('success', 'На ваш Email было отправлено письмо со ссыкой на восстановление пароля');
        }
        return view('front.user.password_reset');
    }

    //Восстановления пароля,  форма замены пароля
    public function password_change($email, $token)
    {
       $item = DB::table('password_resets')->where('email', $email)->first();
       if (!$item || $item->token !== $token) abort(404);
       return view('front.user.password_change', compact('item'));
    }

    public function password_store(Request $request, $email)
    {
        $request->validate([
           'password' => 'required|min:3|confirmed'
        ]);
        $user = User::where('email', $email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        DB::table('password_resets')->where('email', $email)->delete();
        return redirect()->route('login')->with('success', 'Ваш пароль был изменён');
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
            'email' => 'required|email|exists:users,email',
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
