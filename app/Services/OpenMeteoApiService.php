<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OpenMeteoApiService extends AbstractWeatherApiService
{
    protected string $forecastDataAttribute = 'open_meteo_data';

    public function fetchData(): array
    {
        try {
            $response = Http::retry(2, 500, function (\Exception $exception, PendingRequest $request) {
                Log::error(__CLASS__, [$exception, $request]);
            })->withQueryParameters([
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'hourly' => 'temperature_2m,precipitation',
                'daily' => 'temperature_2m_max,temperature_2m_min,precipitation_sum',
                'timezone' => 'auto',
                'forecast_days' => $this->forecastDays,
            ])->get('https://api.open-meteo.com/v1/forecast');
            return $response->json();
        } catch (\Exception $exception) {
            return [];
        }
    }
}
