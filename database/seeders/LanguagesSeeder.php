<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Admin\Models\Language;

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
            'flag' => 'flag-icon-USD',
            'is_default' => true,
        ]);

        Language::query()->create([
            'title' => 'العربية',
            'code' => 'ar',
            'direction' => 'rtl',
            'flag' => 'flag-icon-EGP',
            'is_default' => false,
        ]);
    }
}
