<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $fillable = [
        'address_en', 
        'address_ar', 
        'phone', 
        'email', 
        'map_embed',
        'working_hours_en',
        'working_hours_ar'
    ];
}
