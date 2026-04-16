<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show Register
    public function showRegister()
    {
        return view('register');
    }

    // Register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // DEFAULT ROLE
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    // Show Login
    public function showLogin()
    {
        return view('login');
    }

    // Login
    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email','password'))) {
            return redirect('/dashboard');
        }

        return back()->with('error','Invalid Credentials');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}