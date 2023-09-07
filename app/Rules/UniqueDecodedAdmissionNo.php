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
        // Decode the base64-encoded value
        $decodedValue = base64_decode($value); // Decoding base64
        //dd($decodedValue);
        // Check if the decoded value is unique in the database
        return DB::table('student')
            ->where('student_admissionNo', $decodedValue)
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
