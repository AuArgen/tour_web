<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['slug', 'title', 'content', 'image_url'];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
    ];

    public function getTitleAttribute($value)
    {
        $locale = app()->getLocale();
        return $value[$locale] ?? $value[config('app.fallback_locale')] ?? '';
    }

    public function getContentAttribute($value)
    {
        $locale = app()->getLocale();
        return $value[$locale] ?? $value[config('app.fallback_locale')] ?? '';
    }
}
