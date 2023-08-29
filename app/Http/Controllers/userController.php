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

    //activate unauthorized user
    public function activateUnauthorizedUsers($user_id)
    {
        $data = [      
            'status' => "1",
        ];
        User::where('id', $user_id)->update($data);
        return redirect()->back()->withInput();
    }

    //delete unauthorized user
    public function deleteUnauthorizedUsers($user_id)
    {
        User::where('id', $user_id)->delete();
        return redirect()->back()->withInput();
    }

    //view authorized users list
    public function authorizedUsers()
    {
        $users = $this->user->where('status',  '1')->get();
        //dd($users);
        return view('authorised_system_users')->with('users', $users);
        //return view('unauthorised_system_users');
    }

    //deactivate unauthorized user
    public function deactivateAuthorizedUsers($user_id)
    {
        $seletedUser = User::find($user_id);
        //dd($seletedUser);
        $data = [      
            'status' => "0",
        ];
        User::where('id', $user_id)->update($data);
        return redirect()->back()->withInput();
    }
}
