<?php

namespace App\Services;

use App\Interfaces\WeatherApiInterface;

abstract class AbstractWeatherApiService implements WeatherApiInterface
{
    protected float $latitude;
    protected float $longitude;
    protected float $forecastDays = 7;
    protected string $forecastDataAttribute;

    public function setCoordinates(float $latitude, float $longitude): void
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getForecastDataAttribute(): string
    {
        return $this->forecastDataAttribute;
    }

    public abstract function fetchData(): array;
}
