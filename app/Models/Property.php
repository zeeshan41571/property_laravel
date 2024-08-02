<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'location', 'contact_person', 'contact_phone', 'parking_no', 'user_id'
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
