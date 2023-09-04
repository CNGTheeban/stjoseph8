<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    /**
     * @var string $table
     */
    protected $table = 'donation';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'id',
        'firstName',
        'lastName',
        'email',
        'contactno',
        'donerRef',
        'amount',
        'receiverRef',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
