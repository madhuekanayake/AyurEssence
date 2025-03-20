<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'quantity',
        'price',
        'image',
    ];

    // Relationship with SalePlants model
    public function product()
    {
        return $this->belongsTo(SalePlants::class, 'product_id');
    }
}
