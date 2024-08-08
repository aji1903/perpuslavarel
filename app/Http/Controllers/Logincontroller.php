<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class Logincontroller extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function actionLogin(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();

        // password_verify()
        if (password_verify($request->password, $user->password)) {
            return "Login Berhasil";
        } else {
            return "Login Gagal";
        }
    }
}
