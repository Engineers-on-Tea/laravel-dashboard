<?php

namespace App\Models;

use App\Bll\Lang;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BaseModel extends Model
{
    public function getCreatedAtAttribute($value): string
    {
        if ($value == null) return '';
        return Carbon::parse($value)
            ->format('Y-m-d g:i A');
    }

    public function getUpdatedAtAttribute($value): string
    {
        if ($value == null) return '';
        return Carbon::parse($value)
            ->format('Y-m-d g:i A');
    }

    public function Data(): HasMany
    {
        return $this->hasMany(get_class($this) . 'Data', 'master_id', 'id');
    }

    /**
     * @throws Exception
     */
    public function Translation(): HasOne
    {
        return $this->hasOne(get_class($this) . 'Data', 'master_id', 'id')
            ->where('lang_id', Lang::getLangId());
    }
}
