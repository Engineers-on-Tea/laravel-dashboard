<?php

namespace App\Modules\Blog\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modules\BlogCategory\Models\BlogCategory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends BaseModel
{
    use SoftDeletes;

    protected $table = 'blogs';
    protected $guarded = [];

    public function Parent(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }
}
