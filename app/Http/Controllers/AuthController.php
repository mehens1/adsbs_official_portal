<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login()
    {
        $data = [
            'page' => 'Login'
        ];
        return view('login', compact('data'));
    }

    public function loginAuth(Request $req)
    {
        
        return "hahaha";
    }
}
