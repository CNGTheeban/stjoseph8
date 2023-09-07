<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniqueDecodedAdmissionNo implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
<<<<<<< HEAD
       // Decode the base64-encoded value
        //dd($value);
        $encodedValue = base64_encode($value); // Decoding base64
        //dd($encodedValue);
        // Check if the decoded value is unique in the database
=======
        // encode the input value
        //dd($value);
        $encodedValue = base64_encode($value); // Decoding base64
        //dd($encodedValue);
        // Check if the encoded value is unique in the database
>>>>>>> Email-Module.Theeban
        return !DB::table('student')
            ->where('student_admissionNo', $encodedValue)
            ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Admission No already exisit';
    }
}
