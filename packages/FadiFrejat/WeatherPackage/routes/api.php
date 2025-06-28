<?php


use Illuminate\Support\Facades\Route;
use FadiFrejat\WeatherPackage\Controllers\API\WeatherController;

Route::middleware('api')->prefix('api')->group(function () {
    Route::prefix('weather')->name('admin.')->group(function () {
    Route::get('formatted', [WeatherController::class, 'formatted']);
    Route::get('/weather/suggestion', [WeatherController::class, 'suggestion']);
    });
});
