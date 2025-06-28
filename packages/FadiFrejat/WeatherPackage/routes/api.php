<?php


use Illuminate\Support\Facades\Route;
use FadiFrejat\WeatherPackage\Controllers\API\WeatherController;

Route::middleware('api')->prefix('api')->group(function () {

    Route::prefix('weather')->group(function () {
        Route::get('formatted', [WeatherController::class, 'formatted']);
        Route::get('suggestion', [WeatherController::class, 'suggestion']);
    });
});
