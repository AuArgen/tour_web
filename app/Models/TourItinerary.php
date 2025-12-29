<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourItinerary extends Model
{
    protected $fillable = ['tour_id', 'day_number', 'title', 'description'];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
    ];

    public function getTitleAttribute($value)
    {
        $locale = app()->getLocale();
        return $value[$locale] ?? $value[config('app.fallback_locale')] ?? '';
    }

    public function getDescriptionAttribute($value)
    {
        $locale = app()->getLocale();
        return $value[$locale] ?? $value[config('app.fallback_locale')] ?? '';
    }
}
