<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'websiteName',
        'email',
        'contactNo1',
        'contactNo2',
        'addressLine1',
        'addressLine2',
        'city',
        'whatsappLink',
        'instagramLink',
        'facebookLink',
        'linkedinLink',
        'twitterLink',
        'status',

    ];
}
