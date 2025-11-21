<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Маршрут для детальной страницы тура
Route::get('/tours/{slug}', function ($slug) {
    // Здесь в будущем будет логика для получения данных тура из базы данных по $slug
    return view('tour-detail');
})->name('tour.detail');
