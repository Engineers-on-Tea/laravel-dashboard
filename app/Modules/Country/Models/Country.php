<?php

namespace App\Modules\Country\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends BaseModel
{
    use SoftDeletes;

    protected $table = 'countries';
    protected $guarded = [];
}
