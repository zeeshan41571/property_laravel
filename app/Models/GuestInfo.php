<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestInfo extends Model
{
    use HasFactory;
    protected $table = 'guests_info';
    protected $fillable = [
        'guest_name',
        'guest_surname',
        'guest_email',
        'guest_phone',
        'guest_street',
        'guest_street1',
        'guest_street2',
        'guest_postal',
        'guest_city',
        'guest_country',
        'document_type',
        'document_number',
        'document_image1',
        'document_image2',
        'property_bookings_id',
    ];

    public function propertyBooking()
    {
        return $this->belongsTo(PropertyBookings::class, 'property_bookings_id');
    }
}
