<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('Authentication.register');
    }

    public function login()
    {
        return view('Authentication.login');
    }
}
