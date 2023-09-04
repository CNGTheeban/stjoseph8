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

    //insert student
    public function insertStudent(StudentDataRequest $request)
    {
        $checkUserID = $request->input('inputUserId');

        $data = [
            'userid' =>  encrypt($request->input('inputUserId')),
            'admissionNo' => encrypt($request->input('inputAdmissionNo')), 
            'firstName' => encrypt($request->input('inputFirstName')),
            'lastName' => encrypt($request->input('inputLastName')),
            'DOB' => encrypt($request->input('inputDOB')),
            'currentGrade' => encrypt($request->input('inputGrade')),      
            'status' => encrypt("1"),
        ];

        //parentModel::create($data);
        student::create($data);
        return redirect()->route('profile.load')->with('success', 'Student has been registered successfully.');
    }
}
