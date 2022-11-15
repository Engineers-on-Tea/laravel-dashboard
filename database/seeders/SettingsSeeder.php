<?php

namespace Database\Seeders;

use App\Modules\Settings\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = require_once(app_path('Modules/Settings/settings.php'));

        foreach ($settings as $key => $value) {
            Setting::query()
                ->updateOrCreate([
                    'key' => $key,
                ], [
                    'value' => $value,
                ]);
        }
    }
}
