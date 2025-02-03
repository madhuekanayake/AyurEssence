<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AyurvedicHospital extends Model
{
    use HasFactory;
    protected $fillable = [
        'ayurvedicHospitalId',
        'name',
        'address',
        'email',
        'phone',
        'location',
        'openTime',
        'closeTime',
        'openDays',
        'description',
        'latitude',
        'longitude',

    ];

    public function images()
{
    return $this->hasMany(AyurvedicHospitalImages::class, 'ayurvedicHospitalId', 'id');
}
}
