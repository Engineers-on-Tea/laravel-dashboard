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
        $this->call(LanguagesSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(CitiesSeeder::class);
    }
}
