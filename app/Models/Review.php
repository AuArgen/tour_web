<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['author_name', 'author_country', 'text', 'rating', 'avatar_url', 'is_active'];

    protected $casts = [
        'text' => 'array',
    ];

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

    public function getTextAttribute($value)
    {
        return $this->getLocalizedValue($value);
    }
}
