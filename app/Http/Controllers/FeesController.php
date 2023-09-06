<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Fees;
use Illuminate\Http\Request;
use App\Http\Requests\FeesDataRequest;
use Illuminate\Support\Facades\Auth;

class FeesController extends Controller
{
    public function insertFee(FeesDataRequest $request)
    {
        $checkChildID = $request->input('inputStudentId');
        $checkFeeId = Fees::where('childid', '=', $request->input('inputStudentId'))->
                            where('term', '=', $request->input('inputTerm'))->exists();
        $message = '';
        if($checkFeeId){
            $data = [
                'childid' => $request->input('inputStudentId'),
                'term' => $request->input('inputTerm'),
                'amount' => $request->input('inputAmount'),    
                'status' => "1",
            ];
        Fees::where('childid', '=', $request->input('inputStudentId'))->
              where('term', '=', $request->input('inputTerm'))->update($data);
        $message = 'Data has been Updated successfully.';
        }else{
            $data = [
                'childid' => $request->input('inputStudentId'),
                'term' => $request->input('inputTerm'),
                'amount' => $request->input('inputAmount'),    
                'status' => "1",
            ];
    
        fees::create($data);
        $message = 'Data has been inserted successfully.';
        }
        
        return redirect()->route('fee.load')->with('success', $message);
    }
}
