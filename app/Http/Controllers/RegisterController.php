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
    //view render
    public function index()
    {
        return view('register');
    }

    public function customRegistration(RegistrationDataRequest $request)
    {  
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("login")->withSuccess('You have Registerd. Please wait till admin authenticate your account.');
    }

    public function create(array $data)
    {
        $insertData = [
            'usertype' => $data['inputUsertype'],
            'username' => $data['inputUsername'],
            'email' => $data['inputEmail'],
            'password' => bcrypt($data['inputPassword']),
            'reference' => $data['inputReference'],
            'status' => '0',
        ];
        //'password' => Hash::make($data['inputPassword']),
        //dd($insertData);
        return User::create($insertData);
    }
}
