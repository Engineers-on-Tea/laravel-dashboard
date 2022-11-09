<?php

namespace App\Modules\Country\Models;

use App\Models\Language;
use App\Modules\Country\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CountryData extends Model
{
    use HasFactory;
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
