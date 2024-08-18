<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view("login");
    }

    public function login_process(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email Wajib diisi',
                'password.required' => 'Password wajib diisi',
            ]
        );

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();

            if ($user->role == 1) {
                return redirect()->route('superadmin.index');
            } elseif ($user->role == 2) {
                return redirect()->route('dashboard');
            }
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu berhasil Logout');
    }
}
