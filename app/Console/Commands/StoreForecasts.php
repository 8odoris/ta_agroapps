<?php

namespace App\Console\Commands;

use App\Models\Forecast;
use App\Repositories\WeatherDataRepository;
use App\Services\OpenMeteoApiService;
use App\Services\WeatherApiApiService;
use App\Services\WeatherApiService;
use Illuminate\Console\Command;

class StoreForecasts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:store-forecasts {api}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stores weather forecasts for each location';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $weatherApi = match ($this->argument('api')) {
            'open_meteo' => new OpenMeteoApiService(),
            'weather_api' => new WeatherApiApiService(),
        };
        $apiService = new WeatherApiService($weatherApi);

        Forecast::all()->each(function (Forecast $forecast) use ($apiService) {
            (new WeatherDataRepository($apiService, $forecast))->storeData();
            sleep(1);
        });
    }
}
