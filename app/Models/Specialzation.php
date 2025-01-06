<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialzation extends Model
{
    use HasFactory;
    protected $fillable = [
        'specializationId',
        'specializationName',
        'description',
        



    ];
}
