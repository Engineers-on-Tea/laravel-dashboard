<?php

namespace App\Modules\City\Models;

use App\Models\BaseModel;
use App\Modules\Admin\Models\Language;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CityData extends BaseModel
{
    use SoftDeletes;

    protected $table = 'city_data';

    protected $guarded = [];

    public function Master(): BelongsTo

    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function Lang(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'lang_id', 'id');
    }
}
