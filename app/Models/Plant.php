<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;
    protected $fillable = [
        'plantId',
        'plantname',
        'plantCategoryId',
        'medicalUses',
        'scientificName',
        'growthRequirements',
        'geographicalDistribution',
        'partUsed',
        'traditionalUses',
        'modernUses',
        'toxicityInformation',
        'availability',
        'associatedDiseases',
        'description',

    ];

    public function category()
{
    return $this->belongsTo(PlantCategory::class, 'plantCategoryId', 'plantCategoryId');
}


public function images()
{
    return $this->hasMany(PlantImage::class, 'plantId', 'plantId');
}
}
