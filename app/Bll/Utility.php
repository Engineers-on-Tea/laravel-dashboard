<?php

namespace App\Bll;

use App\Modules\Country\Models\Country;
use App\Modules\Settings\Models\Setting;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class Utility
{
    public static function getDashboardCountries(): Collection
    {
        $countries = Country::query()
            ->with([
                'Data'
            ])
            ->where('status', 1)
            ->get();
        return $countries->map(function ($country) {
            return [
                'id' => $country->__get('id'),
                'title' => self::getTranslatedValueAdmin($country, 'title'),
            ];
        });
    }

    /**
     * @throws Exception
     */
    public static function getTranslatedValueAdmin($item, $key): ?string
    {
        $value = $item->Data->where('lang_id', Lang::getAdminLangId())->first();

        if (!$value) {
            $value = $item->Data->first();
        }

        return $value->__get($key);
    }

    public static function getDefaultSettings()
    {
        $settings = Session::get('settings');

        if (!$settings) {
            $settings = Setting::query()
                ->get()
                ->pluck('value', 'key')
                ->toArray();
            Session::put('settings', $settings);
        }

        return $settings;
    }
}
