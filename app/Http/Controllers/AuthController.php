<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email'     => 'required|email',
                'password'  => 'required'
            ],
            [
                'email.required' => 'Email Tidak Valid.',
                'email.email' => 'Email Tidak Valid.',
                'password.required' => 'Password Tidak Valid.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = User::where('email', $request->email)->first();

        if ($user == null) {
            Session::flash('login_error', 'Login Gagal, Pastikan Username dan Password Anda Benar!!!.');
            return redirect()->back();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if ($user['role'] == 'admin') {
                return redirect('/dashboard');
            }
            return redirect('/');
        }
        return back()->with('login_error', 'Login Gagal, Pastikan Username dan Password Anda Benar!!!');
    }

    public function Register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'username'  => 'required',
                'email'     => 'required|email|unique:users',
                'password'  => 'required|min:8|confirmed'
            ],
            [
                'username.required' => 'Username Tidak Valid.',
                'email.required' => 'Email Tidak Valid.',
                'email.email' => 'Email Tidak Valid.',
                'email.unique' => 'Email Sudah Terdaftar.',
                'password.required' => 'Password Tidak Valid.',
                'password.min' => 'Password Tidak Valid.',
                'password.confirmed' => 'Password Tidak Valid.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = User::create([
            'email' => $request->email,
            'password'  => bcrypt($request->password),
            'username' => $request->username
        ]);

        if ($user) {
            Session::flash('success', 'Akun berhasil dibuat, silakan login dengan akun ada!!!');
            return redirect('/login');
        }

        return back()->with('error', 'Akun gagal dibuat, silakan data anda!!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
