<?php

namespace VendorPackage\BluePanel;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class BluePanelServiceProvider extends ServiceProvider
{
    static public function formatNumber($number)
    {
        return number_format($number, 2); // Format number with two decimal places
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/blue-panel.php', 'blue-panel');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'blue-panel');


        // Share the Vue component with Laravel views
        Inertia::share('demo', function () {
            return [
                'message' => 'This is a Vue component from the BluePanel package!',
            ];
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/blue-panel.php' => config_path('blue-panel.php'),
        ], 'blue-panel-config');
    }
}
