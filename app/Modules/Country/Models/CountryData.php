<?php

namespace App\Modules\Country\Models;

use App\Models\Language;
use App\Modules\Country\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CountryData extends Model
{
    use HasFactory;

    protected $table = 'country_data';

    protected $guarded = [];

    public function Country()
    {
        return $this->belongsTo(Country::class, 'master_id', 'id');
    }

    public function Lang()
    {
        return $this->belongsTo(Language::class, 'lang_id', 'id');
    }

}
