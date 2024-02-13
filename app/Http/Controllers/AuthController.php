<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use Illuminate\Support\Str;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function login()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }

        $data = [
            'page' => 'Login'
        ];
        return view('login', compact('data'));
    }

    public function loginAuth(Request $request)
    {

        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        $loginField = $this->detectLoginField($validatedData['username']);

        $credentials = [
            $loginField => $validatedData['username'],
            'password' => $validatedData['password']
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        }

        throw ValidationException::withMessages(['username' => 'Invalid credentials']);

    }

    protected function detectLoginField($username)
    {
        return filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone_number';
    }

    public function forgotPassword()
    {

        $data = [
            'page' => 'Forgot Password'
        ];
        return view('forgotPassword', compact('data'));
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'You are logged out successfully!');
    }
}
