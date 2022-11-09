<?php

namespace App\Modules\Blog\Models;

use App\Bll\Lang;
use App\Models\BaseModel;
use App\Modules\Blog\Models\BlogData;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modules\BlogCategory\Models\BlogCategory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'blogs';
    protected $guarded = [];

    public function Data(): HasMany
    {
        return $this->hasMany(BlogData::class, 'master_id', 'id');
    }

    public function AdminTranslated(): HasOne
    {
        $value = $this->hasOne(BlogData::class, 'master_id', 'id')
            ->where('lang_id', Lang::getAdminLangId());

        if (!$value) {
            $value = $this->hasOne(BlogData::class, 'master_id', 'id');
        }

        return $value;
    }

    public function Translation(): HasOne
    {
        return $this->hasOne(BlogData::class, 'master_id', 'id')
            ->where('lang_id', Lang::getLangId());
    }

    public function Parent(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }
}
