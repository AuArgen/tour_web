<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Direction extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'image_url'];

    protected $casts = [
        'name' => 'array',
        'description' => 'array',
    ];

    public function tours(): HasMany
    {
        return $this->hasMany(Tour::class);
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

    // Админка үчүн чийки (raw) маалыматты алуу керек болсо, башка ат менен алабыз
    public function getNameRawAttribute()
    {
        return $this->attributes['name'];
    }
}
