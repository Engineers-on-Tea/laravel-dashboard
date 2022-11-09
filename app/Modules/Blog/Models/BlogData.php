<?php

namespace App\Modules\Blog\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogData extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'blog_data';

    protected $guarded = [];

    public function Master(): BelongsTo
    {
        return $this->belongsTo(Blog::class, 'master_id', 'id');
    }

    public function Lang(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'lang_id', 'id');
    }
}
