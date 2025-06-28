<?php

namespace FadiFrejat\WeatherPackage\Controllers\API;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function formatted()
    {
        echo "fad";
//        $weather = $this->fetchWeather();
//        return response()->json([
//            'temperature' => $weather['temperature'] . '°C',
//            'windspeed' => $weather['windspeed'] . ' km/h',
//        ]);
    }

    public function suggestion()
    {
        $weather = $this->fetchWeather();
        $temp = $weather['temperature'];

        $suggestion = $temp > 35
            ? "It's hot outside, stay hydrated!"
            : ($temp < 20
                ? "It's a bit chilly, consider a jacket."
                : "The weather is nice today.");

        return response()->json(['suggestion' => $suggestion]);
    }

    private function fetchWeather()
    {
        $response = Http::get(config('weather.api_url'), [
            'latitude' => config('weather.latitude'),
            'longitude' => config('weather.longitude'),
            'current_weather' => 'true'
        ]);

        return $response['current_weather'] ?? [];
    }
}
