<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signUp(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => 'required|min:5',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'role' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect('/login')->with('message', 'Register Success.');
    }

    public function signIn(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->role == 'admin'){
                return redirect()->intended('/admin');
            };
            return redirect()->intended('/products');
        }

        return back()->with('error', 'Login Failed.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Logout Success.');;
    }
}
