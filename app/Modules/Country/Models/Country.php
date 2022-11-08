<?php

namespace App\Modules\Country\Models;

use App\Bll\Lang;
use App\Models\BaseModel;
use App\Modules\Country\Models\CountryData;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends BaseModel
{
    use HasFactory;

    protected $table = 'countries';
    protected $guarded = [];

    public function Data(): HasMany
    {
        return $this->hasMany(CountryData::class, 'master_id', 'id');
    }

    public function AdminTranslated(): HasOne
    {
        $value = $this->hasOne(CountryData::class, 'master_id', 'id')
            ->where('lang_id', Lang::getAdminLangId());

        if (!$value) {
            $value = $this->hasOne(CountryData::class, 'master_id', 'id');
        }
        return $value;
    }

    public function Translation(): HasOne
    {
        return $this->hasOne(CountryData::class, 'master_id', 'id')
            ->where('lang_id', Lang::getLangId());
    }

    public function getStatusAttribute($value)
    {
        return $value == 1 ? _i('Active') : _i('Not Active');
    }
}
