<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => ['required', Password::min(6)->numbers()->mixedCase()],
        ]);

        // return json_encode($request->all());
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('dashboard');
        }

        return redirect()->back();
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registered(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:staff,admin',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create($validated);

        auth()->login($user);

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('dashboard');
    }
}
