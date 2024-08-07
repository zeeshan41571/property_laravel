<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyBookings extends Model
{
    use HasFactory;
    protected $fillable = [
        'arrival_date',
        'arrival_time',
        'departure_date',
        'departure_time',
        'guest_edit_link',
        'guest_edit_link_status',
        'owner_edit_link',
        'owner_edit_link_status',
        'instructions',
        'user_id',
        'property_id',
    ];

    public function guests()
    {
        return $this->hasMany(GuestInfo::class);
    }
    
     public function property()
     {
         return $this->belongsTo(Property::class);
     }
}
