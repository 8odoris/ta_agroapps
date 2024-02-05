<?php

namespace App\Providers;

use App\Services\WeatherApiService;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class WeatherApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('WeatherApiService', function (Application $app, $parameters) {
            return new WeatherApiService(app()->make($parameters['class']));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
