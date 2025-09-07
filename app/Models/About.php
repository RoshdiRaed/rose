<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class About extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'about';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'image',
        'cta_text_en',
        'cta_text_ar',
        'cta_link',
        'video_url',
        'features',
        'is_active'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean'
    ];

    /**
     * Get the localized title based on current locale.
     *
     * @return string
     */
    public function getLocalizedTitleAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"title_$locale"};
    }

    /**
     * Get the localized description based on current locale.
     *
     * @return string
     */
    public function getLocalizedDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"description_$locale"};
    }

    /**
     * Get the localized CTA text based on current locale.
     *
     * @return string
     */
    public function getLocalizedCtaTextAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"cta_text_$locale"};
    }

    /**
     * Get the image URL.
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::url($this->image) : asset('img/logo.png');
    }

    /**
     * Scope a query to only include active about sections.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
