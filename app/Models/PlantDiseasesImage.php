<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantDiseasesImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'plantDiseasesImageId',
        'diseasesId',
        'image',
        'isPrimary',


    ];

    public function plantDiseasses()
    {
        return $this->belongsTo(PlantDiseases::class, 'diseasesId', 'diseasesId');
    }
}
