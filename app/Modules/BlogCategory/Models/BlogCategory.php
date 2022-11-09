<?php

namespace App\Modules\BlogCategory\Models;

use App\Bll\Lang;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Modules\BlogCategory\Models\BlogCategoryData;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategory extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'blogs_categories';

    protected $guarded = [];

    public function Data(): HasMany
    {
        return $this->hasMany(BlogCategoryData::class, 'master_id', 'id');
    }

    public function AdminTranslated(): HasOne
    {
        $value = $this->hasOne(BlogCategoryData::class, 'master_id', 'id')
            ->where('lang_id', Lang::getAdminLangId());

        if (!$value) {
            $value = $this->hasOne(BlogCategoryData::class, 'master_id', 'id');
        }

        return $value;
    }

    public function Translation(): HasOne
    {
        return $this->hasOne(BlogCategoryData::class, 'master_id', 'id')
            ->where('lang_id', Lang::getLang());
    }

}
