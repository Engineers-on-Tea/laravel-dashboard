<?php

namespace App\Modules\Admin\Models\Country;

use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Admin\Models\Country\Country;
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
