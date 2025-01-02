<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingAndEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'meetingAndEventlId',
        'title',
        'content',
        'startDate',
        'endDate',
        'startTime',
        'endTime',
        'contactNo',
        'description',
        'image',

    ];
}
