<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Infrastructure\Country\Persistence\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::truncate();

        Country::create([
            'name' => 'Austria',
            'iso2' => 'AT',
            'iso3' => 'AUT',
        ]);

        Country::create([
            'name' => 'France',
            'iso2' => 'FR',
            'iso3' => 'FRA',
        ]);

        Country::create([
            'name' => 'Germany',
            'iso2' => 'DE',
            'iso3' => 'DEU',
        ]);
        Country::create([
            'name' => 'Spain',
            'iso2' => 'ES',
            'iso3' => 'ESP',
        ]);

        Country::create([
            'name' => 'Russian Federation',
            'iso2' => 'RU',
            'iso3' => 'RUS',
        ]);

        Country::create([
            'name' => 'China',
            'iso2' => 'CN',
            'iso3' => 'CHN',
        ]);
    }
}
