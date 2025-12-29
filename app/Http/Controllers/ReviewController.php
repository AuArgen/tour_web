<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index($locale): View
    {
        $reviews = Review::where('is_active', true)->latest()->get();
        return view('reviews', ['reviews' => $reviews]);
    }
}
