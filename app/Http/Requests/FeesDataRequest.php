<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeesDataRequest extends FormRequest
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
            'inputChildrenName' => 'required',
            'inputAdmissionNo' => 'required',
            'inputClass' => 'required',
            'inputTerm' => 'required',
            'inputAmount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }
}