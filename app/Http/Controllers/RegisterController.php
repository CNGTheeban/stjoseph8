<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationDataRequest;
use Hash;
use Session;
use App\Models\User;
use App\Models\UserVerify;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mail; 
use Illuminate\Contracts\Encryption\DecryptException;


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
        $data = $request->all();
        $data = [
            'usertype' => base64_encode('User'),
            'firstname' => base64_encode($request->input('inputFirstName')),
            'lastname' => base64_encode($request->input('inputLastName')),
            'nic' => base64_encode($request->input('inputNIC')),
            'email' => base64_encode($request->input('inputEmail')),
            'password' => Hash::make($request->input('inputPassword')),
            //'reference' =>encrypt('User'),
            'is_email_verified' => 0,
            'status' => 1,
        ];
        $check = $this->user::create($data);

        $token = Str::random(64);
        UserVerify::create([
            'user_id' =>  $check->id, 
            'token' => $token
        ]);
        
        Mail::send('email.emailVerificationEmail', ['token' => $token], function($message) use($request){
            $message->to($request->input('inputEmail'));
            $message->subject('Email Verification Mail');
        });
        //dd($data);
         
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
