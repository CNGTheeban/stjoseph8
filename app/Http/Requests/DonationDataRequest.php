<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationDataRequest extends FormRequest
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
            'inputEmail' => 'required',
            'inputContactNo' => 'required',
            'inputDonRef' => 'required',
            'inputDonAmount' => 'required',
        ];
    }
}
