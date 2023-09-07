<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueDecodedUserEmail;
use App\Rules\UniqueDecodedUserNIC;

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
            // 'inputUsertype' => 'required|string',
            'inputFirstName' => 'required',
            'inputLastName' => 'required',
            'inputEmail' => ['required',new UniqueDecodedUserEmail],
            'inputNIC' => ['required',new UniqueDecodedUserNIC],
            'inputPassword' => 'required|min:6',
        ];
    }
}
