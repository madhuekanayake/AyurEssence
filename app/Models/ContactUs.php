<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'contactUsId',
        'name',
        'email',
        'phoneNo',
        'massage',
        'reply_message',
        'isReply',



    ];
}
