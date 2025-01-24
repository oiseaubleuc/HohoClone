<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

    class LoginController extends Controller
    {
            public function login(Request $request)
            {
            $request->validate([
            'email' => 'required|email',
            'password' => 'required'
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
            Log::info('Login successful for user: ' . $credentials['email']);
            return redirect()->intended('/dashboard');
            } else {


            Log::error('Login failed for user: ' . $credentials['email']);
            return back()->withErrors(['email' => 'De opgegeven gegevens zijn onjuist.']);
            }
        }
    }
