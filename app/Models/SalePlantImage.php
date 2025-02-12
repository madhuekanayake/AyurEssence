<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalePlantImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'salePlantImageId',
        'salePlantId',
        'image',
        'isPrimary',

    ];

    public function salePlants()
    {
        return $this->belongsTo(SalePlants::class, 'id', 'id');
    }
}
