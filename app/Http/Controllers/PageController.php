<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\View\View;

class PageController extends Controller
{
    public function show($locale, string $slug): View
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('page', ['page' => $page]);
    }
}
