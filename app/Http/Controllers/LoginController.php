<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginDataRequest;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistrationDataRequest;

class LoginController extends Controller
{
    //view render
    public function index()
    {
        return view('login');
    }

    public function customLogin(LoginDataRequest $request)
    {
        $credentials = $request->request;
        $u = Auth::user();
        $userDetail = User::get();
        $email = $request['inputEmail'];
        $userType= "";
        foreach($userDetail as $Ur)
        {          
            if(base64_decode( $Ur -> email) == $email){
                $email = $Ur -> email;
                $userType = base64_decode($Ur ->usertype);
            }
        }
        //dd(Auth::attempt(['email' => $email, 'password' => $request['inputPassword']]));
        if (Auth::attempt(['email' => $email, 'password' => $request['inputPassword']])) {
            //return redirect()->intended('index')->withSuccess('Logged in');
            //auth()->login($user);
            if($userType == 'User'){
                if (!Auth::user()->is_email_verified) {
       
                    auth()->logout();
                    return redirect("login")->withSuccess('You need to confirm your account. We have sent you an activation code, please check your email.');


                  }else{
                    return redirect("/profile")->withSuccess('You have LoggedIn.');

                  }
            

            }else{
                return redirect("/parents")->withSuccess('You have LoggedIn.');
                return redirect("/")->withSuccess('You have LoggedIn.');
            }
           
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function logout()
    {
        Auth::logout();

        // Perform any additional actions if needed

        return redirect('/login'); // Redirect to the desired page after logout
    }
}
