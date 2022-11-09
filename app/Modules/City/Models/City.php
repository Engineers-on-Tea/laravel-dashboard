<?php

namespace App\Modules\City\Models;

use App\Bll\Lang;
use App\Models\BaseModel;
use App\Modules\City\Models\CityData;
use App\Modules\Country\Models\Country;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cities';
    protected $guarded = [];

    public function Parent(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function Data(): HasMany
    {
        return $this->hasMany(CityData::class, 'master_id', 'id');
    }

    public function AdminTranslated(): HasOne
    {
        $value = $this->hasOne(CityData::class, 'master_id', 'id')
            ->where('lang_id', Lang::getAdminLangId());

        if (!$value) {
            $value = $this->hasOne(CityData::class, 'master_id', 'id');
        }

        return $value;
    }

    public function Translation(): HasOne
    {
        return $this->hasOne(CityData::class, 'master_id', 'id')
            ->where('lang_id', Lang::getLang());
    }

    public function getStatusAttribute($value): string
    {
        return $value == 1 ? _i('Active') : _i('Not Active');
    }
}
