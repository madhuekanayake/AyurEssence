<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctorId',
        'name',
        'email',
        'phoneNo',
        'gender',
        'profilePicture',
        'specializationId',
        'yearsOfExperience',
        'qualification',
        'registerNo',
        'workplaceName',
        'availableDays',
        'consultationStartTime',
        'consultationEndTime',
        'description',

    ];

    public function specialzations()
{
    return $this->belongsTo(Specialzation::class, 'specializationId', 'specializationId');
}
}
