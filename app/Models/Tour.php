<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tour extends Model
{
    protected $fillable = [
        'direction_id', 'name', 'slug', 'description', 'short_description',
        'hero_image', 'price', 'duration', 'difficulty', 'group_size'
    ];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
        'short_description' => 'array',
        'duration' => 'array',
        'difficulty' => 'array',
        'group_size' => 'array',
    ];

    public function direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class);
    }

    public function itinerary(): HasMany
    {
        return $this->hasMany(TourItinerary::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(TourImage::class);
    }

    // Аксессорлор (Тилге жараша чыгаруу үчүн)
    // Эскертүү: Бул ыкма жөнөкөй, бирок админкада түзөтүүдө (edit) көйгөй жаратышы мүмкүн.
    // Админкада түзөтүү үчүн $tour->getAttributes()['name'] колдонсо болот.

    public function getNameAttribute($value)
    {
        $locale = app()->getLocale();
        return $value[$locale] ?? $value[config('app.fallback_locale')] ?? '';
    }

    public function getDescriptionAttribute($value)
    {
        $locale = app()->getLocale();
        return $value[$locale] ?? $value[config('app.fallback_locale')] ?? '';
    }

    public function getShortDescriptionAttribute($value)
    {
        $locale = app()->getLocale();
        return $value[$locale] ?? $value[config('app.fallback_locale')] ?? '';
    }

    public function getDurationAttribute($value)
    {
        $locale = app()->getLocale();
        return $value[$locale] ?? $value[config('app.fallback_locale')] ?? '';
    }

    public function getDifficultyAttribute($value)
    {
        $locale = app()->getLocale();
        return $value[$locale] ?? $value[config('app.fallback_locale')] ?? '';
    }

    public function getGroupSizeAttribute($value)
    {
        $locale = app()->getLocale();
        return $value[$locale] ?? $value[config('app.fallback_locale')] ?? '';
    }
}
