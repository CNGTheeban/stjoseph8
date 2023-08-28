<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDetailDataRequest extends FormRequest
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
            'inputFirstName' => 'required',
            'inputLastName' => 'required',
            'inputNIC' => 'required|max:12|unique:user_details,nic',
            'inputAddressLine1' => 'required',
            'inputAddressLine1' => '',
            'inputCity' => 'required',
            'inputProvince' => 'required',
            'inputCountry' => 'required',
            'inputEmail' => 'required',
            'inputContactNo' => 'required',
            'inputMobileNo' => '',
        ];
    }
}
