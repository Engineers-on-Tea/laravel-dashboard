<?php

namespace App\Modules\Admin\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends BaseModel
{
    use HasFactory;

    protected $table = 'languages';

    protected $guarded = [];

    public function getIsDefaultAttribute($value)
    {
        return $value == 1 ? ('Default') : ('Not Default');
    }
}
