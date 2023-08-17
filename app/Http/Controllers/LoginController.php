<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //view render
    public function index()
    {
        return view('login');
    }
}
