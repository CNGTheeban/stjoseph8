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
        'id',
        'childid',
        'term',
        'amount',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
