<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrationDataRequest;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Encryption\DecryptException;
use Mail;

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
        // $data = array('name'=>"Virat Gandhi");
   
        // Mail::send(['text'=>'mail'], $data, function($message) {
        //    $message->to('g.sobana24@gmail.com', 'Tutorials Point')->subject
        //       ('Laravel Basic Testing Mail');
        //    $message->from('stjones154@outlook.com','Virat Gandhi');
        // });
        // echo "Basic Email Sent. Check your inbox.";

        $data = $request->all();
        $data = [
            'usertype' => 'User',
            'firstname' => $request->input('inputFirstName'),
            'lastname' => $request->input('inputLastName'),
            'nic' => $request->input('inputNIC'),
            'email' => $request->input('inputEmail'),
            'password' => Hash::make($request->input('inputPassword')),
            'reference' =>'User',
            'status' => 0,
        ];
        //dd($data);
        $check = User::create($data);
        event(new Registered($check));

        auth()->login($check);
        return redirect("login")->withSuccess('You have Registerd. please check your email for a verification link.');
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
