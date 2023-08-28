<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'child';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'id',
        'userid',
        'fullName',
        'initialName',
        'DOB',
        'childsGrade',
        'childsAdmissionNo',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
