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

        $value = $setting->value;

        // Эгер сап болсо, JSON decode кылып көрөбүз (double encoding болсо)
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            if (is_array($decoded)) {
                $value = $decoded;
            }
        }

        // Эгер массив болсо, тилге жараша кайтарабыз
        if (is_array($value)) {
            $locale = App::getLocale(); // ru, en, kg
            return $value[$locale] ?? $value[config('app.fallback_locale')] ?? array_values($value)[0] ?? $default;
        }

        // Эгер массив эмес болсо (мисалы, жөнөкөй сап), ошону кайтарабыз
        return $value ?? $default;
    }
}
