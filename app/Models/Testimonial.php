<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Testimonial extends Model
{
    protected $fillable = ['name_en', 'name_ar', 'position_en', 'position_ar', 'content_en', 'content_ar', 'rating', 'image'];
    
    protected $appends = ['image_url'];
    
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            $url = asset('storage/' . $this->image);
            Log::info('Generated image URL:', [
                'image' => $this->image,
                'url' => $url,
                'exists' => file_exists(storage_path('app/public/' . $this->image)),
                'storage_path' => storage_path('app/public/' . $this->image)
            ]);
            return $url;
        }
        Log::info('No image for testimonial', ['id' => $this->id]);
        return null;
    }
}
