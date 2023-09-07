<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'fees';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'fee_id',
        'fee_studentid',
        'fee_term',
        'fee_currentClass',
        'fee_purpose',
        'fee_amount',
        'fee_status',
        'fee_created_at',
        'fee_updated_at',
        'fee_deleted_at'
    ];
}
