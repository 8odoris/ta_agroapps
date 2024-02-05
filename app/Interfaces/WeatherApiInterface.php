<?php

namespace App\Interfaces;

interface WeatherApiInterface
{
    public function setCoordinates(float $latitude, float $longitude): void;

    public function getForecastDataAttribute(): string;

    public function fetchData(): array;
}
