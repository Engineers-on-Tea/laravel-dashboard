<?php

namespace App\Bll;

use App\Modules\Country\Models\Country;

class Utility
{
    public static function getDashboardCountries()
    {
        $countries = Country::query()
            ->with([
                'Data'
            ])
            ->where('status', 1)
            ->get();
        $countries = $countries->map(function ($country) {
            return [
                'id' => $country->id,
                'title' => self::getTranslatedValueAdmin($country, 'title'),
            ];
        });
        return $countries;
    }

    public static function getTranslatedValueAdmin($item, $key)
    {
        $value = $item->Data->where('lang_id', Lang::getAdminLangId())->first();

        if (!$value) {
            $value = $item->Data->first();
        }

        return $value->__get($key);
    }
}
