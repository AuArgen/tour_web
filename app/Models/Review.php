<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['author_name', 'author_country', 'text', 'rating', 'avatar_url', 'is_active'];

    protected $casts = [
        'text' => 'array',
    ];

    public function getTextAttribute($value)
    {
        $locale = app()->getLocale();
        return $value[$locale] ?? $value[config('app.fallback_locale')] ?? '';
    }
}
