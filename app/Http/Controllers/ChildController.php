<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Child;
use Illuminate\Http\Request;
use App\Http\Requests\ChildDataRequest;
use Auth;

class ChildController extends Controller
{
    protected $child;

    public function __construct(Child $child)
    {
        $this->child = $child;
    }

    //add children render
    public function addChild()
    {
        $user = Auth::user();
        $child = $this->child->join('users', 'users.id', '=', 'child.userid')->where('child.userid',  $user->id)->get();//
        return view('addchild')->with('childdata', $child);
    }
    
    //edit children render
    public function editChild()
    {
        return view('editchild');
    }

    public function insertChild(ChildDataRequest $request)
    {
        $checkUserID = $request->input('inputUserId');
        $message = '';

        if($checkUserID == "0"){
            $data = [
                'userid' => $request->input('inputUserID'),
                'username' => $request->input('inputUserName'),
                'firstname' => $request->input('inputFirstName'),
                'lastname' => $request->input('inputLastName'),
                'nic' => $request->input('inputNIC'),
                'addressline1' => $request->input('inputAddressLine1'),
                'addressline2' => $request->input('inputAddressLine2'),
                'city' => $request->input('inputCity'),
                'province' => $request->input('inputProvince'),
                'country' => $request->input('inputCountry'),
                'email' => $request->input('inputEmail'),
                'contactno' => $request->input('inputContactNo'),
                'mobileno' => $request->input('inputMobileNo'),            
                'status' => "1",
            ];

            //parentModel::create($data);
            $this->userDetail->create($data);
            $message = 'Data has been inserted successfully.';
            //return redirect()->route('parent.form')->with('success', 'Data has been inserted successfully.');
        }else{
            $data = [
                'username' => $request->input('inputUserName'),
                'firstname' => $request->input('inputFirstName'),
                'lastname' => $request->input('inputLastName'),
                'nic' => $request->input('inputNIC'),
                'addressline1' => $request->input('inputAddressLine1'),
                'addressline2' => $request->input('inputAddressLine2'),
                'city' => $request->input('inputCity'),
                'province' => $request->input('inputProvince'),
                'country' => $request->input('inputCountry'),
                'contactno' => $request->input('inputContactNo'),
                'mobileno' => $request->input('inputMobileNo'),            
                'status' => "1",
            ];

            $uData = [                
                'username' => $request->input('inputUserName'),
                'email' => $request->input('inputEmail'),
            ];

            //parentModel::create($data);
            $this->userDetail->where('userdetailid', $checkUserDetailID)->update($data);
            $this->user->where('id', $userID)->update($uData);
            $message = 'Data has been updated successfully.';
            //return redirect()->route('parent.form')->with('success', 'Data has been updated successfully.');
            
        }
        return redirect()->route('parent.form')->with('success', $message);
    }
}
