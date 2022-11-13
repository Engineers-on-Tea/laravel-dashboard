<?php

namespace App\Modules\Country\Models;

use App\Bll\Lang;
use App\Models\BaseModel;
use App\Modules\Country\Models\CountryData;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'countries';
    protected $guarded = [];
}
