<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\View\View;

class TourController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show($locale, string $slug): View
    {
        $tour = Tour::where('slug', $slug)
            ->with(['itinerary', 'images', 'direction'])
            ->firstOrFail();

        // Галереяны ыңгайлуу форматка келтирүү (массив URL)
        $tour->gallery = $tour->images->pluck('image_url')->toArray();

        // Эгер галерея бош болсо, hero сүрөтүн кошуп коёбуз
        if (empty($tour->gallery) && $tour->hero_image) {
            $tour->gallery = [$tour->hero_image];
        }

        return view('tour-detail', ['tour' => $tour]);
    }
}
