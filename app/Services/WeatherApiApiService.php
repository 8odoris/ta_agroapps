<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherApiApiService extends AbstractWeatherApiService
{
    protected string $forecastDataAttribute = 'weather_api_data';

    public function fetchData(): array
    {
        try {
            $response = Http::retry(2, 500, function (\Exception $exception, PendingRequest $request) {
                Log::error(__CLASS__, [$exception, $request]);
            })->withQueryParameters([
                'q' => $this->latitude . ',' . $this->longitude,
                'days' => $this->forecastDays,
                'key' => config('weather.weatherapi_key'),
            ])->
            get('https://api.weatherapi.com/v1/forecast.json');
            return $response->json();
        } catch (\Exception $exception) {
            return [];
        }
    }
}
