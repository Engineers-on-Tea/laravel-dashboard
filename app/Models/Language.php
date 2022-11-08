<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table = 'languages';

    protected $guarded = [];

    public function getIsDefaultAttribute($value)
    {
        return $value == 1 ? _i('Default') : _i('Not Default');
    }
}
