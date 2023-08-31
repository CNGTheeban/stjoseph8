<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Encryption\DecryptException;

use App\Models\userDetail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserDetailDataRequest;
use Auth;

class userDetailController extends Controller
{
    protected $userDetail;
    protected $user;

    public function __construct(userDetail $userDetail, user $user)
    {
        $this->userDetail = $userDetail;
        $this->user = $user;
    }

    public function index()
    {
        $u = Auth::user();
        $userDetail = $this->userDetail->join('users', 'users.id', '=', 'user_details.userid')
                                       ->where('user_details.userid',  $u->id)->get();
        $childDetail = $this->userDetail->join('users', 'users.id', '=', 'user_details.userid')
                                       ->join('child','child.userid','=','user_details.userid')
                                       ->where('user_details.userid',  $u->id)->get();
        $FeesDetail = $this->userDetail->join('users', 'users.id', '=', 'user_details.userid')
                            ->join('child','child.userid','=','user_details.userid')
                            ->join('fees','fees.childid', '=', 'child.id')
                            ->where('user_details.userid',  $u->id)->get();
                                       foreach($childDetail as $chil)
                                       {
                                           try {
                                               $chil -> fullName = decrypt( $chil -> fullName);
                                               $chil -> childsAdmissionNo = decrypt( $chil -> childsAdmissionNo);
                               
                                           } catch (DecryptException $e) {
                                               //
                                           }
                                       }
                                       foreach($FeesDetail as $fee)
                                       {
                                           try {
                                               $fee -> fullName = decrypt( $fee -> fullName);
                                               $fee -> childsAdmissionNo = decrypt( $fee -> childsAdmissionNo);
                                               $fee -> time = $fee -> created_at->format('H:i');
                               
                                           } catch (DecryptException $e) {
                                               //
                                           }
                                       }
        return view('profile')->with('userdata', $userDetail)
                              ->with('childdata',$childDetail)
                              ->with('FeesData',$FeesDetail);
    }

    //add parent render
    public function addParent()
    {
        $u = Auth::user();        
        $userDetail = $this->userDetail->join('users', 'users.id', '=', 'user_details.userid')->where('user_details.userid',  $u->id)->get();
        return view('addParent')->with('data', $userDetail);
    }

    //add user details
    // public function createParent(CreateParentDataRequest $request)
    public function createParent(UserDetailDataRequest $request)
    {
        $checkUserDetailID = $request->input('inputUserDetailID');
        $userID = $request->input('inputUserID');
        $message = '';
        if($checkUserDetailID == "0"){
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
