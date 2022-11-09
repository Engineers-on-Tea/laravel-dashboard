<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public function getCreatedAtAttribute($value): string
    {
        return Carbon::parse($value)
            ->format('Y-m-d g:i A');
    }

    public function getUpdatedAtAttribute($value): string
    {
        return Carbon::parse($value)
            ->format('Y-m-d g:i A');
    }
}
