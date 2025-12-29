<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switch($code): RedirectResponse
    {
        if (in_array($code, ['ru', 'en', 'kg'])) {
            Session::put('locale', $code);
        }
        return redirect()->back();
    }
}
