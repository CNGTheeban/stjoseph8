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
        //$checkUserID = $request->input('inputUserId');
        //dd($request->input());
        $data = [
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
