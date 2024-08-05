<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    // In Guest.php model
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
