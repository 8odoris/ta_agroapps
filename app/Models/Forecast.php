<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Forecast
 *
 * @mixin Builder
 *
 * @property-read int $id
 *
 * @property float $latitude
 * @property float $longitude
 * @property array $open_meteo_data
 * @property array $weather_api_data
 *
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 */
class Forecast extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'open_meteo_data' => 'array',
        'weather_api_data' => 'array',
    ];
}
