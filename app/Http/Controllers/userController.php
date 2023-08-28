<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    //view authorized users list
    public function index()
    {
        return view('authorised_system_users');
    }

    //view unauthorized users list
    public function unauthorizedUsers()
    {
        $users = $this->user->where('status',  '0')->get();
        //dd($users);
        return view('unauthorised_system_users')->with('users', $users);
        //return view('unauthorised_system_users');
    }
}
