<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Student extends Model
{
    use HasFactory;
    /**
     * @var string $table
     */
    protected $table = 'student';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'student_id',
        'student_userid',
        'student_admissionNo',
        'student_firstName',
        'student_lastName',
        'student_DOB',
        'student_currentGrade',
        'student_status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $hidden = [
        'student_firstName',
        'student_lastName',
        'student_admissionNo',
        'student_DOB',
        'student_currentGrade',
    ];
}
