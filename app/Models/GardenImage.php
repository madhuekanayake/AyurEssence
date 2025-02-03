<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GardenImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'gardenImageId',
        'gardenId',
        'image',
        'description',

    ];

    public function herbalGarden()
    {
        return $this->belongsTo(HerbalGarden::class, 'gardenId', 'gardenId');
    }
}
