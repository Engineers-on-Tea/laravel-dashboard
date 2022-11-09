<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Country\Models\Country;
use App\Modules\Country\Models\CountryData;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                'title' => 'Egypt',
                'code' => 'EG',
                'dialing_code' => '+20',
                'lat' => '26.820553',
                'lng' => '30.802498',
            ],
            [
                'title' => 'United Arab Emirates',
                'code' => 'AE',
                'dialing_code' => '+971',
                'lat' => '23.424076',
                'lng' => '53.847818',
            ],
            [
                'title' => 'Saudi Arabia',
                'code' => 'SA',
                'dialing_code' => '+966',
                'lat' => '23.885942',
                'lng' => '45.079162',
            ],
            [
                'title' => 'Kuwait',
                'code' => 'KW',
                'dialing_code' => '+965',
                'lat' => '29.31166',
                'lng' => '47.481766',
            ],
            [
                'title' => 'Bahrain',
                'code' => 'BH',
                'dialing_code' => '+973',
                'lat' => '25.930414',
                'lng' => '50.637772',
            ],
            [
                'title' => 'Oman',
                'code' => 'OM',
                'dialing_code' => '+968',
                'lat' => '21.512583',
                'lng' => '55.923255',
            ],
            [
                'title' => 'Qatar',
                'code' => 'QA',
                'dialing_code' => '+974',
                'lat' => '25.354826',
                'lng' => '51.183884',
            ],
            [
                'title' => 'Jordan',
                'code' => 'JO',
                'dialing_code' => '+962',
                'lat' => '30.585164',
                'lng' => '36.238414',
            ],
            [
                'title' => 'Lebanon',
                'code' => 'LB',
                'dialing_code' => '+961',
                'lat' => '33.854721',
                'lng' => '35.862285',
            ],
            [
                'title' => 'Syria',
                'code' => 'SY',
                'dialing_code' => '+963',
                'lat' => '34.802075',
                'lng' => '38.996815',
            ],
            [
                'title' => 'Iraq',
                'code' => 'IQ',
                'dialing_code' => '+964',
                'lat' => '33.223191',
                'lng' => '43.679291',
            ],
            [
                'title' => 'Yemen',
                'code' => 'YE',
                'dialing_code' => '+967',
                'lat' => '15.552727',
                'lng' => '48.516388',
            ],
        ];

        foreach ($countries as $country) {
            $check = Country::where('code', $country['code'])->first();

            if ($check) continue;

            $base = Country::query()
                ->create([
                    'code' => $country['code'],
                    'dialing_code' => $country['dialing_code'],
                    'lat' => $country['lat'],
                    'lng' => $country['lng'],
                ]);

            CountryData::query()
                ->create([
                    'master_id' => $base->id,
                    'title' => $country['title'],
                    'lang_id' => 1,
                ]);
        }
    }
}
