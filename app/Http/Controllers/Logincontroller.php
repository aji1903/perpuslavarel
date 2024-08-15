<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Alert;

class Logincontroller extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function actionLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $credentials = $request->only(['email' => $email, 'password' => $request->password]);
        $user = User::where('email', $email)->first();

        // password_verify()
        if (password_verify($request->password, $user->password)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        } else {
            return redirect()->back()->withErrors('Login gagal, mohon periksa email dan password anda.');
        }
    }
}
