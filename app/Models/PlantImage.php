<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'plantImageId',
        'plantId',
        'image',
        'isPrimary',

    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plantId', 'plantId');
    }
}
