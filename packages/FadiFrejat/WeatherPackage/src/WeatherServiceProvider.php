<?php

namespace FadiFrejat\WeatherPackage;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        Log::info(";;");
        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'weather');

        // Publish config
        $this->publishes([
            __DIR__.'/../config/weather.php' => config_path('weather.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/weather.php', 'weather');
    }
}
