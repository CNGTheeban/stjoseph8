<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationDataRequest extends FormRequest
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
<<<<<<< HEAD
            'inputFirstName' => 'required',
            'inputLastName' => 'required',
            'inputNIC' => 'required|max:12|unique:users,nic',
=======
            // 'inputUsertype' => 'required|string',
            'inputFirstName' => 'required',
            'inputLastName' => 'required',
>>>>>>> Dev.Sobana---Custom-Email-Verification
            'inputEmail' => 'required|email|unique:users,email',
            'inputPassword' => 'required|min:6',
        ];
    }
}
