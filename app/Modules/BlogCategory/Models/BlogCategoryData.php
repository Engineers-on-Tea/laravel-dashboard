<?php

namespace App\Modules\BlogCategory\Models;

use App\Models\BaseModel;
use App\Modules\Admin\Models\Language;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategoryData extends BaseModel
{
    use SoftDeletes;

    protected $table = 'blogs_category_data';

    protected $guarded = [];

    public function Master(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'master_id', 'id');
    }

    public function Lang(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'lang_id', 'id');
    }
}
