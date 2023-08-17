<?php

namespace App\Http\Controllers;
use App\parentModel;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    //profile render
    public function index()
    {
        return view('parents');
    }
    
    //profile render
    public function profile()
    {
        return view('profile');
    }
    //add parent render
    public function addParent()
    {
        return view('addParent');
    }

    // public function createParent(CreateParentDataRequest $request)
    // {
    //     $data = [
    //         'firstname' => $request->input('inputFirstName'),
    //         'lastname' => $request->input('inputLastName'),
    //         'nic' => $request->input('inputNIC'),
    //         'addressline1' => $request->input('inputAddressLine1'),
    //         'addressline2' => $request->input('inputAddressLine2'),
    //         'city' => $request->input('inputCity'),
    //         'province' => $request->input('inputProvince'),
    //         'country' => $request->input('inputCountry'),
    //         'email' => $request->input('inputEmail'),
    //         'contactno' => $request->input('inputContactNo'),
    //         'mobileno' => $request->input('inputMobileNo'),            
    //         'status' => "1",
    //     ];

    //     parentModel::create($data);
    //     return redirect()->route('parent.index')->with('success', 'Data has been inserted successfully.');
    // }
}
