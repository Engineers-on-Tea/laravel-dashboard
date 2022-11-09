<?php

namespace App\Bll;

use App\Modules\Country\Models\Country;

class Utility
{
    public static function getDashboardCountries()
    {
        $countries = Country::query()
            ->with([
                'AdminTranslated'
            ])
            ->where('status', 1)
            ->get();
        $countries = $countries->map(function ($country) {
            return [
                'id' => $country->id,
                'title' => $country->AdminTranslated->title,
            ];
        });
        return $countries;
    }
}
