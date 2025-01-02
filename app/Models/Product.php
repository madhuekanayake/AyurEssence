<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'productId',
        'productCategoryId',
        'productName',
        'description',



    ];

    // Product.php (Model)
public function category()
{
    return $this->belongsTo(ProductCategory::class, 'productCategoryId', 'productCategoryId');
}

}
