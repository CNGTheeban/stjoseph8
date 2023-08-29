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
    public function addChild($id)
    {
        $user = Auth::user();
        $child = $this->child->where('child.id',  $id)->get();
      // $child = $this->child->join('users', 'users.id', '=', 'child.userid')->where('child.id',  $id)->get();//
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
        $checkUserDetailID = $request->input('inputChildId');
        $message = '';

        if($checkUserDetailID == "0"){
            $data = [
                'userid' => $request->input('inputUserId'),
                'fullName' => $request->input('inputFullName'),
                'initialName' => $request->input('inputInitialName'),
                'DOB' => $request->input('inputDOB'),
                'childsGrade' => $request->input('inputGrade'),
                'childsAdmissionNo' => $request->input('inputAdmissionNO'),       
                'status' => "1",
            ];

            //parentModel::create($data);
            child::create($data);
            $message = 'Data has been inserted successfully.';
            //return redirect()->route('parent.form')->with('success', 'Data has been inserted successfully.');
        }else{
            $data = [
                'userid' => $request->input('inputUserId'),
                'fullName' => $request->input('inputFullName'),
                'initialName' => $request->input('inputInitialName'),
                'DOB' => $request->input('inputDOB'),
                'childsGrade' => $request->input('inputGrade'),
                'childsAdmissionNo' => $request->input('inputAdmissionNO'),       
                'status' => "1",
            ];

            // $uData = [                
            //     'username' => $request->input('inputUserName'),
            //     'email' => $request->input('inputEmail'),
            // ];

            //parentModel::create($data);
            child::where('id', $checkUserDetailID)->update($data);
            //$this->user->where('id', $userID)->update($uData);
            $message = 'Data has been updated successfully.';
            //return redirect()->route('parent.form')->with('success', 'Data has been updated successfully.');
            
        }
        return redirect()->route('index',$checkUserDetailID)->with('success', $message);
    }
    public function enableChild($id)
    {
        $data = [      
            'status' => "1",
        ];
        child::where('id', $id)->update($data);
        return redirect()->back()->withInput();
    }

    public function deleteChild($id)
    {
        $data = [      
            'status' => "0",
        ];
        child::where('id', $id)->update($data);
        return redirect()->back()->withInput();
    }
}
