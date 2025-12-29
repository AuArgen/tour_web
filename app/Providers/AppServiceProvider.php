<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Миграция учурунда ката чыкпашы үчүн текшерүү
        if (Schema::hasTable('settings')) {
            $settings = Setting::all()->pluck('value', 'key')->toArray();
            View::share('settings', $settings);
        }
    }
}
