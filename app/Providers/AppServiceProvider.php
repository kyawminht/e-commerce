<?php

namespace App\Providers;

use App\Livewire\Frontend\Products\View;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrapFive();
        $webSetting=Setting::first();
        \Illuminate\Support\Facades\View::share('webSetting',$webSetting);
    }
}
