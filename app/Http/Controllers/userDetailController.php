<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Encryption\DecryptException;

use App\Models\userDetail;
use App\Models\User;
use App\Models\Student;

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
        if(count($userDetail)==0){
            $userDetail = $this->user->where('id',  $u->id)->get();
        }
        foreach($userDetail as $User)
        {
            try {
                $User -> firstname = base64_decode( $User -> firstname);
                $User -> lastname = base64_decode( $User -> lastname);
                $User -> nic = base64_decode( $User -> nic);
                $User -> email = base64_decode( $User -> email);


            } catch (DecryptException $e) {
                //
            }
        }

        $childDetail = Student::join('users','users.id', '=', 'student.userid')
                                       ->where('student.userid',  $u->id)
                                       ->where('student.status',  1)->get();
                                       foreach($childDetail as $Student)
                                       {
                                           try {
                                               $Student -> admissionNo = base64_decode( $Student -> admissionNo);
                                               $Student -> firstName = base64_decode( $Student -> firstName);
                                               $Student -> lastName = base64_decode( $Student -> lastName);
                                               $Student -> DOB = base64_decode( $Student -> DOB);
                                               $Student -> currentGrade = base64_decode( $Student -> currentGrade);
                               
                               
                                           } catch (DecryptException $e) {
                                               //
                                           }
                                        }
        // dd($childDetail);
        // $childDetail = $this->userDetail->join('users', 'users.id', '=', 'user_details.userid')
        //                                ->join('child','child.userid','=','user_details.userid')
        //                                ->where('user_details.userid',  $u->id)->get();
        // $FeesDetail = $this->userDetail->join('users', 'users.id', '=', 'user_details.userid')
        //                     ->join('child','child.userid','=','user_details.userid')
        //                     ->join('fees','fees.childid', '=', 'child.id')
        //                     ->where('user_details.userid',  $u->id)->get();
        // foreach($childDetail as $chil)
        // {
        //     try {
        //         $chil -> fullName = decrypt( $chil -> fullName);
        //         $chil -> childsAdmissionNo = decrypt( $chil -> childsAdmissionNo);

        //     } catch (DecryptException $e) {
        //         //
        //     }
        // }
        // foreach($FeesDetail as $fee)
        // {
        //     try {
        //         $fee -> fullName = decrypt( $fee -> fullName);
        //         $fee -> childsAdmissionNo = decrypt( $fee -> childsAdmissionNo);
        //         $fee -> time = $fee -> created_at->format('H:i');

        //     } catch (DecryptException $e) {
        //         //
        //     }
        // }
        return view('profile')->with('userdata', $userDetail)
                             ->with('childdata',$childDetail);
                            //   ->with('FeesData',$FeesDetail);
    }

    //add parent render
    public function addParent()
    {
        $u = Auth::user();
        $userDetail = $this->userDetail->join('users', 'users.id', '=', 'user_details.userid')
                                       ->where('user_details.userid',  $u->id)->get();
        if(count($userDetail)==0){
            $userDetail = $this->user->where('id',  $u->id)->get();
        }
        foreach($userDetail as $User)
        {
            try {
                $User -> firstname = base64_decode( $User -> firstname);
                $User -> lastname = base64_decode( $User -> lastname);
                $User -> nic = base64_decode( $User -> nic);
                $User -> email = base64_decode( $User -> email);


            } catch (DecryptException $e) {
                //
            }
        }
        return view('addParent')->with('data', $userDetail);
    }

    //add user details
    // public function createParent(CreateParentDataRequest $request)
    public function createParent(UserDetailDataRequest $request)
    {
        $checkUserDetailID = $request->input('inputUserDetailID');
        $userID = $request->input('inputUserID');
        $message = '';
        if($checkUserDetailID == "0" ||$checkUserDetailID == null ){
            $data = [
                'userid' => $request->input('inputUserID'),
                'addressline1' => $request->input('inputAddressLine1'),
                'addressline2' => $request->input('inputAddressLine2'),
                'city' => $request->input('inputCity'),
                'province' => $request->input('inputProvince'),
                'country' => $request->input('inputCountry'),
                'contactno' => $request->input('inputContactNo'),
                'mobileno' => $request->input('inputMobileNo'),            
                'status' => "1",
            ];
            $udata = [
            'firstname' => base64_encode($request->input('inputFirstName')),
            'lastname' => base64_encode($request->input('inputLastName')),
            'nic' => base64_encode($request->input('inputNIC')),
            ];
            //parentModel::create($data);
            $this->userDetail->create($data);
            $this->user->where('id', $userID)->update($udata);
            $message = 'Data has been inserted successfully.';
            //return redirect()->route('parent.form')->with('success', 'Data has been inserted successfully.');
        }else{
            $data = [
                'addressline1' => $request->input('inputAddressLine1'),
                'addressline2' => $request->input('inputAddressLine2'),
                'city' => $request->input('inputCity'),
                'province' => $request->input('inputProvince'),
                'country' => $request->input('inputCountry'),
                'contactno' => $request->input('inputContactNo'),
                'mobileno' => $request->input('inputMobileNo'),            
                'status' => "1",
            ];

            $udata = [
                'firstname' => base64_encode($request->input('inputFirstName')),
                'lastname' => base64_encode($request->input('inputLastName')),
                'nic' => base64_encode($request->input('inputNIC')),
            ];

            //parentModel::create($data);
            $this->userDetail->where('userid', $checkUserDetailID)->update($data);
            $this->user->where('id', $userID)->update($udata);
            $message = 'Data has been updated successfully.';
            //return redirect()->route('parent.form')->with('success', 'Data has been updated successfully.');
            
        }
        return redirect()->route('profile.load')->with('success', $message);
        // return redirect()->route('parent.form',$checkUserDetailID)->with('success', $message);

    }
}
