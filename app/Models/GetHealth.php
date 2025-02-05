<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetHealth extends Model
{
    use HasFactory;
    protected $fillable = [
        'getHealthId',
        'name',
        'email',
        'phone',
        'massage',
        'subject',
        'reply_message',
        'isReply',

    ];
}
