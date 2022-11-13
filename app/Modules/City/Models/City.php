<?php

namespace App\Modules\City\Models;

use App\Models\BaseModel;
use App\Modules\Country\Models\Country;
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
}
