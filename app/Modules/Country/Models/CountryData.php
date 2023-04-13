<?php

namespace App\Modules\Country\Models;

use App\Modules\Admin\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CountryData extends Model
{
    use SoftDeletes;

    protected $table = 'country_data';

    protected $guarded = [];

    public function Master(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'master_id', 'id');
    }

    public function Lang(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'lang_id', 'id');
    }

}
