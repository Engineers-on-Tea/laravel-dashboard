<?php

namespace App\Modules\Admin\Models\Country;

use App\Bll\Lang;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Admin\Models\Country\CountryData;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Country extends Model
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
}
