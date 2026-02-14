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

    // Жардамчы метод: JSON же массивден тилди алуу
    private function getLocalizedValue($value)
    {
        // Эгер сап болсо, JSON decode кылып көрөбүз
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            if (is_array($decoded)) {
                $value = $decoded;
            }
        }

        if (is_array($value)) {
            $locale = app()->getLocale();
            return $value[$locale] ?? $value[config('app.fallback_locale')] ?? array_values($value)[0] ?? '';
        }

        return $value;
    }

    // Аксессорлор

    public function getNameAttribute($value)
    {
        return $this->getLocalizedValue($value);
    }

    public function getDescriptionAttribute($value)
    {
        return $this->getLocalizedValue($value);
    }

    public function getShortDescriptionAttribute($value)
    {
        return $this->getLocalizedValue($value);
    }

    public function getDurationAttribute($value)
    {
        return $this->getLocalizedValue($value);
    }

    public function getDifficultyAttribute($value)
    {
        return $this->getLocalizedValue($value);
    }

    public function getGroupSizeAttribute($value)
    {
        return $this->getLocalizedValue($value);
    }
}
