<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConservationAwareness extends Model
{
    use HasFactory;
    protected $fillable = [
        'conservationAwarenessesId',
        'endangeredStatus',
        'sustainableHarvesting',
        'reforestationProjects',
        'biodiversityImportance',
        'image',


    ];
}
