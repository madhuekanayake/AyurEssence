<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AyurvedaGuide extends Model
{
    use HasFactory;
    protected $fillable = [
        'ayurvedaGuideId',
        'title',
        'information',
        'description',


    ];
}
