<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TourController;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\TourController as AdminTourController;
use App\Http\Controllers\Admin\DirectionController as AdminDirectionController; // Жаңы контроллер
use App\Models\Direction;
use App\Models\Tour;

// 1. Башкы бетке киргенде демейки тилге багыттоо
Route::get('/', function () {
    return redirect('/' . config('app.fallback_locale', 'ru'));
});

// 2. Админ панелдин маршруттары (Auth менен корголгон)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    // Админдин башкы бети (Dashboard)
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Багыттарды башкаруу (CRUD)
    Route::resource('directions', AdminDirectionController::class);

    // Турларды башкаруу (CRUD)
    Route::resource('tours', AdminTourController::class);

    // Профильди башкаруу (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 3. Аутентификация маршруттары (Breeze кошкон)
require __DIR__.'/auth.php';

// 4. Публичный сайттын маршруттары (Тил префикси менен)
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => \App\Http\Middleware\SetLocale::class
], function () {

    // Башкы бет
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    // Направления (Тизме)
    Route::get('/directions', function () {
        $directions = Direction::all();
        return view('directions-list', ['directions' => $directions]);
    })->name('directions.index');

    // Направление (Деталдуу)
    Route::get('/direction/{slug}', [DirectionController::class, 'show'])->name('direction.show');

    // Туры (Тизме)
    Route::get('/tours', function () {
        $tours = Tour::with('direction')->get();
        return view('tours-list', ['tours' => $tours]);
    })->name('tours.index');

    // Тур (Деталдуу)
    Route::get('/tour/{slug}', [TourController::class, 'show'])->name('tour.detail');

    // Статикалык барактар (О нас, Контакты)
    Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');

    // Отзывтар
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

});
