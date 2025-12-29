<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // Маршруттан тилди алабыз (мисалы: 'ru' же 'en')
        $locale = $request->route('locale');

        // Эгер тил бар болсо, аны орнотобуз
        if ($locale) {
            App::setLocale($locale);

            // Бул эң маанилүү жери!
            // Бардык route() функцияларына автоматтык түрдө 'locale' параметрин кошот.
            // Ошондо ар бир жерге ['locale' => 'ru'] деп жазып отуруунун кереги жок.
            URL::defaults(['locale' => $locale]);
        }

        return $next($request);
    }
}
