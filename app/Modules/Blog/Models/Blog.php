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

    public function Parent(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }
}
