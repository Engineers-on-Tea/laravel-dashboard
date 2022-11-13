<?php

namespace App\Bll;

use App\Modules\Country\Models\Country;
use Illuminate\Support\Collection;

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
                'id' => $country->__get('id'),
                'title' => self::getTranslatedValueAdmin($country, 'title'),
            ];
        });
        return $countries;
    }

    public static function getTranslatedValueAdmin($item, $key): ?string
    {
        $value = $item->Data->where('lang_id', Lang::getAdminLangId())->first();

        if (!$value) {
            $value = $item->Data->first();
        }

        return $value->__get($key);
    }
}
