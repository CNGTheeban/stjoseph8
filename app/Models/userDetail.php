<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userDetail extends Model
{    
    /**
     * @var string $table
     */
    protected $table = 'user_details';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'userdetailid',
        'userid',
        'username',
        'firstname',
        'lastname',
        'nic',
        'addressline1',
        'addressline2',
        'city',
        'province',
        'country',
        'contactno',
        'mobileno',
        'status',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    use HasFactory;
}
