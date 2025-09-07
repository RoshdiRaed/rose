<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['name_en', 'name_ar', 'position_en', 'position_ar', 'content_en', 'content_ar', 'rating'];
}
