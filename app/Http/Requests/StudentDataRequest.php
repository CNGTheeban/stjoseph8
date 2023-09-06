<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {        
        return [
            'inputUserId' => 'required',
            'inputAdmissionNo' => [
                'required',
                // new UniqueDecodedAdmissionNo('student', 'student_admissionNo')
                'unique:'.base64_decode('student,student_admissionNo'),
            ],
            'inputFirstName' => 'required',
            'inputLastName' => 'required',
            'inputDOB' => 'required',
            'inputGrade' => 'required|max:2',
        ];
    }
}
