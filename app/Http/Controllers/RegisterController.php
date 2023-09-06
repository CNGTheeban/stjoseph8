<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationDataRequest;
use Hash;
use Session;
use App\Models\User;
use App\Models\UserVerify;

use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $user = Auth::user();
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
            'usertype' => 'User',
            'firstname' => $request->input('inputFirstName'),
            'lastname' => $request->input('inputLastName'),
            'nic' => $request->input('inputNIC'),
            'email' => $request->input('inputEmail'),
            'password' => Hash::make($request->input('inputPassword')),
            //'reference' =>'User',
            'status' => 1,
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

    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
              
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
  
      return redirect()->route('login')->with('message', $message);
    }

}
