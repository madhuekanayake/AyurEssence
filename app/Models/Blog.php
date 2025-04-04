<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'blogId',
        'title',
        'content',
        'date',
        'description',


    ];

    public function images()
{
    return $this->hasMany(BlogImage::class, 'blogId', 'blogId');
}
}
