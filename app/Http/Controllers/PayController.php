<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Auth;

class PayController extends Controller
{
    //add fee render
    public function index()
    {
        $u = Auth::user();
        $students = Student::join('fees','fees.childid','=','student.student_id')
        ->where('student.student_userid',  $u->id)
        ->where('student.student_status',  1)->get();
        foreach($students as $Student)
        {
            try {
                $Student -> student_admissionNo = base64_decode( $Student -> student_admissionNo);
                $Student -> student_firstName = base64_decode( $Student -> student_firstName);
                $Student -> student_lastName = base64_decode( $Student -> student_lastName);
                $Student -> student_DOB = base64_decode( $Student -> student_DOB);
                $Student -> student_currentGrade = base64_decode( $Student -> student_currentGrade);


            } catch (DecryptException $e) {
                //
            }
         }
        //  dd($students);
        return view('/feePayments')->with('StudentData', $students);
    }
// view all fee details via admin
    public function adminIndex()
    {
        $u = Auth::user();
        $students = Student::join('fees','fees.childid','=','student.student_id')
        ->where('student.student_status',  1)->get();
        foreach($students as $Student)
        {
            try {
                $Student -> student_admissionNo = base64_decode( $Student -> student_admissionNo);
                $Student -> student_firstName = base64_decode( $Student -> student_firstName);
                $Student -> student_lastName = base64_decode( $Student -> student_lastName);
                $Student -> student_DOB = base64_decode( $Student -> student_DOB);
                $Student -> student_currentGrade = base64_decode( $Student -> student_currentGrade);
                $Student -> created_at = $Student ->created_at->format('m/d/Y');


            } catch (DecryptException $e) {
                //
            }
         }
        //  dd($students);
        return view('feeReport')->with('StudentData', $students);
    }

    //add fee render
    public function addFee()
    { 
        $u = Auth::user();
        $students = Student::where('student.student_userid',  $u->id)
        ->where('student.student_status',  1)->get();

        foreach($students as $Student)
        {
            try {
                $Student -> student_admissionNo = base64_decode( $Student -> student_admissionNo);
                $Student -> student_firstName = base64_decode( $Student -> student_firstName);
                $Student -> student_lastName = base64_decode( $Student -> student_lastName);
                $Student -> student_DOB = base64_decode( $Student -> student_DOB);
                $Student -> student_currentGrade = base64_decode( $Student -> student_currentGrade);


            } catch (DecryptException $e) {
                //
            }
         }
        //  dd($students);
        return view('addFee')->with('StudentData', $students);
    }
}
