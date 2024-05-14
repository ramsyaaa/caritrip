<?php

namespace App\Http\Controllers\Auth;

use Alert;
use App\User; // Assuming your model is in the App\Models namespace
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function loginpage() {
        return view('auth.login');
    }

    public function loginUser(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);   

        $email = $req->get('email');
        $password = $req->get('password');

        $user = User::where('email', $email)->first();
        if ($user && \Hash::check($password, $user->password)) {
            auth()->guard('web')->login($user);
            session(["email" => $email]);
            alert()->success('Login Success');
            return redirect('/admin');
        } else {
            alert()->error('Email atau Password Salah!');
            return redirect('/auth-user');
        }
    }
}

