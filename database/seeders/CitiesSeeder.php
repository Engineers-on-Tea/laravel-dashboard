<?php

namespace Database\Seeders;

use App\Modules\City\Models\City;
use App\Modules\City\Models\CityData;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'title' => 'Cairo',
                'country_id' => 1,
                'lat' => '30.0444196',
                'lng' => '31.2357116',
            ],
            [
                'title' => 'Alexandria',
                'country_id' => 1,
                'lat' => '31.2000924',
                'lng' => '29.9187387',
            ],
            [
                'title' => 'Giza',
                'country_id' => 1,
                'lat' => '30.013056',
                'lng' => '31.208853',
            ],
            [
                'title' => 'Shubra El-Kheima',
                'country_id' => 1,
                'lat' => '30.0625',
                'lng' => '31.249722',
            ],
            [
                'title' => 'Port Said',
                'country_id' => 1,
                'lat' => '31.2565',
                'lng' => '32.2841',
            ],
            [
                'title' => 'Suez',
                'country_id' => 1,
                'lat' => '29.9737',
                'lng' => '32.5263',
            ],
            [
                'title' => 'Luxor',
                'country_id' => 1,
                'lat' => '25.6872',
                'lng' => '32.6396',
            ],
            [
                'title' => 'Asyut',
                'country_id' => 1,
                'lat' => '27.181',
                'lng' => '31.1833',
            ],
            [
                'title' => 'Tanta',
                'country_id' => 1,
                'lat' => '30.8014',
                'lng' => '31',
            ],
            [
                'title' => 'Mansoura',
                'country_id' => 1,
                'lat' => '31.0456',
                'lng' => '31.3792',
            ],
            [
                'title' => 'Faiyum',
                'country_id' => 1,
                'lat' => '29.3069',
                'lng' => '30.8419',
            ],
            [
                'title' => 'Ismailia',
                'country_id' => 1,
                'lat' => '30.6042',
                'lng' => '32.2722',
            ],
            [
                'title' => 'Zagazig',
                'country_id' => 1,
                'lat' => '30.5861',
                'lng' => '31.5025',
            ],
            [
                'title' => 'Aswan',
                'country_id' => 1,
                'lat' => '24.0934',
                'lng' => '32.907',
            ],
            [
                'title' => 'Damietta',
                'country_id' => 1,
                'lat' => '31.4167',
                'lng' => '31.8167',
            ],
            [
                'title' => 'Minya',
                'country_id' => 1,
                'lat' => '28.1097',
                'lng' => '30.7414',
            ],
            [
                'title' => 'Damanhur',
                'country_id' => 1,
                'lat' => '31.0333',
                'lng' => '30.4667',
            ],
            [
                'title' => 'Beni Suef',
                'country_id' => 1,
                'lat' => '29.0833',
                'lng' => '31.1',
            ],
            [
                'title' => 'Sohag',
                'country_id' => 1,
                'lat' => '26.5564',
                'lng' => '31.6942',
            ],
            [
                'title' => 'Qena',
                'country_id' => 1,
                'lat' => '26.1614',
                'lng' => '32.7189',
            ],
            [
                'title' => 'Kafr El Sheikh',
                'country_id' => 1,
                'lat' => '30.0981',
                'lng' => '31.0944',
            ],
            [
                'title' => 'Shibin El Kom',
                'country_id' => 1,
                'lat' => '30.5833',
                'lng' => '30.95',
            ],
            [
                'title' => 'Banha',
                'country_id' => 1,
                'lat' => '30.4667',
                'lng' => '31.2',
            ],
            [
                'title' => 'Hurghada',
                'country_id' => 1,
                'lat' => '27.2574',
                'lng' => '33.8128',
            ],
            [
                'title' => 'El Mahalla El Kubra',
                'country_id' => 1,
                'lat' => '30.8333',
                'lng' => '31.35',
            ],
            [
                'title' => 'Arish',
                'country_id' => 1,
                'lat' => '31.1314',
                'lng' => '33.7981',
            ],
            [
                'title' => 'Marsa Matruh',
                'country_id' => 1,
                'lat' => '31.3525',
                'lng' => '27.2453',
            ],
            [
                'title' => 'Tala',
                'country_id' => 1,
                'lat' => '30.7833',
                'lng' => '31.0167',
            ],
            [
                'title' => 'Bilbays',
                'country_id' => 1,
                'lat' => '30.4167',
                'lng' => '31.35',
            ],
            [
                'title' => 'Abu Kabir',
                'country_id' => 1,
                'lat' => '30.85',
                'lng' => '31.35',
            ],
            [
                'title' => 'Idfu',
                'country_id' => 1,
                'lat' => '24.975',
                'lng' => '32.8667',
            ],
        ];

        foreach ($cities as $city) {
            $base = City::query()
                ->create([
                    'country_id' => $city['country_id'],
                    'lat' => $city['lat'],
                    'lng' => $city['lng'],
                ]);

            CityData::query()
                ->create([
                    'master_id' => $base->id,
                    'lang_id' => 1,
                    'title' => $city['title'],
                ]);
        }
    }
}
