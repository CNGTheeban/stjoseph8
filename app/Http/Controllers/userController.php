<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //view authorized users list
    public function index()
    {
        return view('authorised_system_users');
    }

    //view unauthorized users list
    public function unauthorizedUsers()
    {
        return view('unauthorised_system_users');
    }
}
