<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\Service;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer("*", function ($view) {
            $settings = Setting::first();

            // Get all services (only name and slug)
            $services = Service::select('name', 'slug')->get();

            // Share with all views
            $view->with([
                'settings' => $settings,
                'c_services' => $services,
            ]);
        });
    }
}
