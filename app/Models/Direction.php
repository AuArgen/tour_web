<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations; // Эгер Spatie пакетин колдонсоңуз, бирок азыр жөнөкөй жол менен кетебиз

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

    // Тилге жараша алуу үчүн (аксессор)
    public function getNameAttribute($value)
    {
        // Эгер JSON болсо, decode кылып, керектүү тилди алабыз
        // Бирок Laravel casts 'array' кылгандан кийин $value массив болуп келет
        $locale = app()->getLocale();
        return $value[$locale] ?? $value[config('app.fallback_locale')] ?? '';
    }

    public function getDescriptionAttribute($value)
    {
        $locale = app()->getLocale();
        return $value[$locale] ?? $value[config('app.fallback_locale')] ?? '';
    }

    // Админка үчүн чийки (raw) маалыматты алуу керек болсо, башка ат менен алабыз
    public function getNameRawAttribute()
    {
        return $this->attributes['name'];
    }
}
