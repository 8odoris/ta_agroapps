<?php

namespace Database\Seeders;

use App\Models\Forecast;
use Illuminate\Database\Seeder;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Forecast::factory()->create();
    }
}
