<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $userRole = auth()->user()->role;

            switch ($userRole) {
                case 'staff':
                    return redirect()->route('staff.stfHome');
                case 'teacher':
                    return redirect()->route('teacher.tchHome');
            }
        }

        return view('auth.login');
    }

    public function postlogin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        $data = $request->only('email', 'password');
        if (auth()->attempt($data)) {
            $userRole = auth()->user()->role;
            switch ($userRole) {
                case 'staff':
                    return redirect()->route('staff.stfHome')->with('loginMessage', 'Login sukes!');
                case 'teacher':
                    return redirect()->route('teacher.tchHome')->with('loginMessage', 'Login sukes!');
            }
        }

        return redirect()->route('login')->with('loginError', 'Identitas tidak valid');
    }

    public function restricted() {
        return view('errors.restrict');
    }

    public function signout() {
        Session::flush();
        auth()->logout();
        return redirect()->route('login');
    }
}

