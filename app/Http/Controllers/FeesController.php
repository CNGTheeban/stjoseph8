<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Fees;
use Illuminate\Http\Request;
use App\Http\Requests\FeesDataRequest;
use Illuminate\Support\Facades\Auth;

class FeesController extends Controller
{
    protected $fees;

    public function __constract(Fees $fees)
    {
        $this->fees = $fees;
    }
    //Fee Payments render
    public function index()
    {
        $u = Auth::user();
        $students = Student::join('fees','fees.fee_studentid','=','student.student_id')->get();
        //dd($students);
        if($students != null){
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
        }
        //  dd($students);
        return view('feePayments')->with('studentFeeDetails', $students);
    }

    //add fee render
    public function addFee()
    { 
        $u = Auth::user();
        $students = Student::where('student.student_userid', $u->id)
            ->where('student.student_status',  1)->get();

        if($students != null){
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
        }
        // dd($students);
        return view('addFee')->with('StudentData', $students);
    }

    public function insertFee(FeesDataRequest $request)
    {
        $data = [
            'fee_studentid' => $request->input('inputStudentId'),
            'fee_term' => $request->input('inputTerm'),
            'fee_currentClass' => $request->input('inputCurrentClass'),
            'fee_purpose' => $request->input('inputPurpose'),    
            'fee_amount' => $request->input('inputAmount'),    
            'fee_status' => "1"
        ];
    
        Fees::insert($data);
        $message = 'Fee paid successfully.';
        
        return redirect()->route('fee.load')->with('success', $message);
    }

    // view all fee details via admin
    public function adminIndex()
    {
        $u = Auth::user();
        $students = Student::join('fees','fees.fee_studentid','=','student.student_id')
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
}
