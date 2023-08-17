<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'inputEmail' => 'required',
            'inputPassword' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        dd($credentials);
        //dd($request['inputEmail']);
        if (Auth::attempt(['email' => $request['inputEmail'], 'password' => $request['inputPassword']])) {
            return redirect()->intended('index')
                        ->withSuccess('Logged in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('register');
    }

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'inputUsertype' => 'required|string',
            'inputUsername' => 'required',
            'inputEmail' => 'required|email|unique:users,email',
            'inputPassword' => 'required|min:6',
            'inputReference' => 'required',
        ]);
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
        ];
        //'password' => Hash::make($data['inputPassword']),
        //dd($insertData);
        return User::create($insertData);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('index');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
