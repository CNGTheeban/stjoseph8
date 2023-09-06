<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Http\Requests\StudentDataRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;

class studentController extends Controller
{
    protected $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    //index
    public function index()
    {
        $user = Auth::user();
        $students = $this->student->join('user_details', 'user_details.userid', '=', 'student.userid');
        return view('addStudent')->with('userDetails', $user);
    }
    public function addStudent()
    {
        $user = Auth::user();
        $student = $this->student->where('student.id',  $id)->get();
        foreach($student as $st)
        {
            try {
                $st -> admissionNo = base64_decode( $st -> admissionNo);
                $st -> firstName = base64_decode( $st -> firstName);
                $st -> lastName = base64_decode( $st -> lastName);
                $st -> DOB = base64_decode( $st -> DOB);
                $st -> currentGrade = base64_decode( $st -> currentGrade);

            } catch (DecryptException $e) {
                //
            }
        }        
       
        // $child = $this->child->join('users', 'users.id', '=', 'child.userid')->where('child.id',  $id)->get();//
        // return view('addchild')->with('childdata', $child);
        return view('addStudent')->with('childdata', $child);
    }
    //insert student
    public function insertStudent(StudentDataRequest $request)
    {
        $checkUserID = $request->input('inputUserId');

        $data = [
            'userid' =>  $request->input('inputUserId'),
            'admissionNo' => base64_encode($request->input('inputAdmissionNo')), 
            'firstName' => base64_encode($request->input('inputFirstName')),
            'lastName' => base64_encode($request->input('inputLastName')),
            'DOB' => base64_encode($request->input('inputDOB')),
            'currentGrade' => base64_encode($request->input('inputGrade')),      
            'status' => 0,
        ];

        //parentModel::create($data);
        student::create($data);
        return redirect()->route('profile.load')->with('success', 'Student has been registered successfully, Please wait till admin will confirm your payment.');
    }
}
