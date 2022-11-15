<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CitiesSeeder;
use Database\Seeders\CountriesSeeder;
use Database\Seeders\LanguagesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            LanguagesSeeder::class,
            CountriesSeeder::class,
            CitiesSeeder::class,
            SettingsSeeder::class,
        ]);
    }
}
