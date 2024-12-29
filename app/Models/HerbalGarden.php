<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HerbalGarden extends Model
{
    use HasFactory;
    protected $fillable = [
        'gardenId',
        'gardenName',
        'gardenAddress',
        'gardenPhone',
        'gardenEmail',
        'gardenLocation',
        'gardenOpenTime',
        'gardenCloseTime',
        'gardenOpenDays',
        'localTicketPrice',
        'foreignTicketPrice',
        'gardenDescription',
    ];
}
