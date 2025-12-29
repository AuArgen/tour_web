<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    protected $casts = [
        'value' => 'array', // JSON -> Array
    ];

    // Учурдагы тилдеги маанини алуу үчүн жардамчы метод
    public static function get(string $key, $default = null)
    {
        $setting = self::where('key', $key)->first();
        if (!$setting) return $default;

        $locale = App::getLocale(); // ru, en, kg
        return $setting->value[$locale] ?? $setting->value[config('app.fallback_locale')] ?? $default;
    }
}
