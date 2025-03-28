<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'plantCategoryId',
        'categoryName',
        'description',
        'image',


    ];

    public function plants()
{
    return $this->hasMany(Plant::class, 'plantCategoryId', 'plantCategoryId');
}
}
