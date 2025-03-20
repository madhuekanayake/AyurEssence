<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'customerId',
        'first_name',
        'last_name',
        'address_line1',
        'address_line2',
        'email',
        'password',
        'google_id', // Add this
        'avatar'
    ];

    protected $hidden = [
        'password',
    ];
}
