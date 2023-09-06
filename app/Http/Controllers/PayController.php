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
        $students = Student::join('fees','fees.childid','=','student.id')
        ->where('student.userid',  $u->id)
        ->where('student.status',  1)->get();
        foreach($students as $Student)
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
        //  dd($students);
        return view('feePayments')->with('StudentData', $students);
    }

    //add fee render
    public function addFee()
    { 
        $u = Auth::user();
        $students = Student::where('student.userid',  $u->id)
        ->where('student.status',  1)->get();

        foreach($students as $Student)
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
        //  dd($students);
        return view('addFee')->with('StudentData', $students);
    }
}
