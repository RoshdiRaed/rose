<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'icon',
        'sort_order',
        'is_active'
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
     * Scope a query to only include active services.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to order services by sort order.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
