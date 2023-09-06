<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginDataRequest;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::attempt(['email' => $request['inputEmail'], 'password' => $request['inputPassword']])) {
            //return redirect()->intended('index')->withSuccess('Logged in');
            //auth()->login($user);
            return redirect("/index")->withSuccess('You have LoggedIn.');
            return redirect("/")->withSuccess('You have LoggedIn.');
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
