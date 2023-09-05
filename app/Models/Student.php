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
        'id',
        'userid',
        'admissionNo',
        'firstName',
        'lastName',
        'DOB',
        'currentGrade',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $hidden = [
        'firstName',
        'lastName',
        'admissionNo',
    ];
}
