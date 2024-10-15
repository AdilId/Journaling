<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm() {
        return view('profile.loginForm');
    }
    public function login(Request $request) {
        $credentials = ['email' => $request->email, 'password' => $request->password];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/journals')->with('success', "your're logged in!");
        } else {
            return redirect()->back()->withErrors([ 'email' => 'Wrong email or password.' ])->onlyInput('email');
        }
    }

    public function logout(Request $request) {
        $request->session()->flush();

        Auth::logout();

        return redirect('/');
    }
}
