<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerParking extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',       // example field
        'surname',   // example field
        'phone_number',   // example field
        'apartment_number',   // example field
        'parking_spot',   // example field
        'year',   // example field
        'car_brand',   // example field
        'car_color',   // example field
        'car_license_plate',   // example field
    ];
}
