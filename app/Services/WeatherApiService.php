<?php

namespace App\Services;

use App\Interfaces\WeatherApiInterface;

class WeatherApiService
{
    public function __construct(private readonly WeatherApiInterface $weatherApi)
    {
    }

    public function setCoordinates(float $latitude, float $longitude): void
    {
        $this->weatherApi->setCoordinates($latitude, $longitude);
    }

    public function getForecastDataAttribute(): string
    {
        return $this->weatherApi->getForecastDataAttribute();
    }

    public function fetchData(): array
    {
        return $this->weatherApi->fetchData();
    }
}
