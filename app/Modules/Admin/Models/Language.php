<?php

namespace App\Modules\Admin\Models;

use App\Models\BaseModel;

class Language extends BaseModel
{

    protected $table = 'languages';

    protected $guarded = [];

    public function getIsDefaultAttribute($value): string
    {
        return $value == 1 ? ('Default') : ('Not Default');
    }
}
