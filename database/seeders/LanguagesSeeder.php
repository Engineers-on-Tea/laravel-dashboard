<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::query()->create([
            'title' => 'English',
            'code' => 'en',
            'direction' => 'ltr',
            'flag' => 'flag-icon-gb',
            'is_default' => true,
        ]);

        Language::query()->create([
            'title' => 'العربية',
            'code' => 'ar',
            'direction' => 'rtl',
            'flag' => 'flag-icon-eg',
            'is_default' => false,
        ]);
    }
}
