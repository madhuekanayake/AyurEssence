<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AyurvedicHospitalImages extends Model
{
    use HasFactory;
    protected $fillable = [
        'ayurvedicHospitalImageId',
        'ayurvedicHospitalId',
        'image',

    ];
}
