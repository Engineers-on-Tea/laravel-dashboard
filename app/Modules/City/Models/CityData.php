<?php

namespace App\Modules\City\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class CityData extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'city_data';

    protected $guarded = [];

    public function City()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
