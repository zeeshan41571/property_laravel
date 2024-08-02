<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',       // example field
        'surname',   // example field
        'phone_number',   // example field
        'apartment_number',   // example field
        'parking_spot',   // example field
        'arrival_date',   // example field
        'departure_date',   // example field
        'car_brand',   // example field
        'car_color',   // example field
        'car_license_plate',   // example field
    ];
}
