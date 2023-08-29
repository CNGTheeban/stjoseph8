<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationDataRequest;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    //view render
    public function index()
    {
        return view('register');
    }

    public function customRegistration(RegistrationDataRequest $request)
    {  
        //$data = $request->all();
        $data = [
            'usertype' => $request->input('inputUsertype'),
            'username' => $request->input('inputUsername'),
            'email' => $request->input('inputEmail'),
            'password' => Hash::make($request->input('inputPassword')),
            'reference' => $request->input('inputReference'),
            'status' => 0,
        ];
        //dd($data);
        $check = $this->user::create($data);
         
        return redirect("login")->withSuccess('You have Registerd. Please wait till admin authenticate your account.');
    }

    // public function create(array $data)
    // {
    //     $validatedData = $request->validate([
    //         'username' => 'required|unique:users',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required'
    //     ]);

    //     $insertData = [
    //         'usertype' => $data['inputUsertype'],
    //         'username' => $data['inputUsername'],
    //         'email' => $data['inputEmail'],
    //         'password' => bcrypt($data['inputPassword']),
    //         'reference' => $data['inputReference'],
    //         'status' => '0',
    //     ];
    //     return User::create($insertData);
    // }
}
