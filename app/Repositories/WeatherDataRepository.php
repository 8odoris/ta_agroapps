<?php

namespace App\Repositories;

use App\Interfaces\WeatherDataInterface;
use App\Models\Forecast;
use App\Services\WeatherApiService;

class WeatherDataRepository implements WeatherDataInterface
{
    public function __construct(protected WeatherApiService $weatherApiService, protected Forecast $forecast)
    {
    }

    public function storeData(): void
    {
        $this->weatherApiService->setCoordinates($this->forecast->latitude, $this->forecast->longitude);
        $this->forecast->{$this->weatherApiService->getForecastDataAttribute()} = $this->weatherApiService->fetchData();
        $this->forecast->save();
    }
}
