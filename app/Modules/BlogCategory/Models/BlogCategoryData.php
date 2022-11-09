<?php

namespace App\Modules\BlogCategory\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modules\BlogCategory\Models\BlogCategory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategoryData extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'blogs_category_data';

    protected $guarded = [];

    public function Master(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'master_id', 'id');
    }
}
