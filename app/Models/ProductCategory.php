<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'productCategoryId',
        'categoryName',
        'description',
        'image',


    ];

    // ProductCategory.php (Model)
public function products()
{
    return $this->hasMany(Product::class, 'productCategoryId', 'productCategoryId');
}

}
