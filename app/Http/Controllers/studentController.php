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
        //$checkUserID = $request->input('inputUserId');
        //dd($request->input());
        $data = [
<<<<<<< HEAD
            'student_userid' =>  $request->input('inputUserId'),
            'student_admissionNo' => base64_encode($request->input('inputAdmissionNo')), 
            'student_firstName' => base64_encode($request->input('inputFirstName')),
            'student_lastName' => base64_encode($request->input('inputLastName')),
            'student_DOB' => base64_encode($request->input('inputDOB')),
            'student_currentGrade' => base64_encode($request->input('inputGrade')),      
            'student_status' => "1",
        ];
        //dd($data);
        //Student::create($data);
        $this->student->create($data);
        return redirect()->route('profile.load')->with('success', 'Student has been registered successfully.');
=======
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
>>>>>>> Email-Module
    }

    //view student details in admin
    public function viewStudent()
    {
        $students = $this->student->join('users', 'users.id', '=', 'student.student_userid')->get();
        
        //dd($students);
        return view('student_list')->with('students', $students);
        // return view('student_list');
    }

    //activate student
    public function activateStudents($student_id)
    {
        $data = [      
            'student_status' => "1",
        ];
        Student::where('student_id', $student_id)->update($data);
        return redirect()->back()->withInput();
    }

    //deactivate student
    public function deactivateStudents($student_id)
    {
        $data = [      
            'student_status' => "0",
        ];
        Student::where('student_id', $student_id)->update($data);
        return redirect()->back()->withInput();
    }
    
    //delete unauthorized user
    public function deleteStudents($student_id)
    {
        Student::where('student_id', $student_id)->delete();
        return redirect()->back()->withInput();
    }
}
