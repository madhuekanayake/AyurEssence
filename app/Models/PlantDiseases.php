<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantDiseases extends Model
{
    use HasFactory;
    protected $fillable = [
        'diseasesId',
        'diseasesName',
        'symptoms',
        'impact',
        'cause',
        'treatment',
        'plantsAffected',

    ];
}
