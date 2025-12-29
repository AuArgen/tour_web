<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use Illuminate\View\View;

class DirectionController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show($locale, string $slug): View
    {
        $direction = Direction::where('slug', $slug)
            ->with('tours')
            ->firstOrFail();

        return view('direction', [
            'direction' => $direction,
            'tours' => $direction->tours
        ]);
    }
}
