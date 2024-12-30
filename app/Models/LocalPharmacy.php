<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalPharmacy extends Model
{
    use HasFactory;
    protected $fillable = [
        'localPharmacyId',
        'name',
        'address',
        'email',
        'phoneNo',
        'location',
        'openTime',
        'closeTime',
        'openDays',
        'description',

    ];
}
