<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalePlants extends Model
{
    use HasFactory;
    protected $fillable = [
        'salePlantId',
        'plantname',
        'plantCategoryId',
        'scientificName',
        'price',
        'stockQuantity',
        'geographicalDistribution',
        'discount',
        'finalPrice',
        'plantingRequirements',
        'maintenanceLevel',
        'description',

    ];

    public function category()
{
    return $this->belongsTo(PlantCategory::class, 'plantCategoryId', 'plantCategoryId');
}

public function images()
{
    return $this->hasMany(SalePlantImage::class, 'salePlantId', 'salePlantId');
}

}
