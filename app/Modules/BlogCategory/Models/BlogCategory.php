<?php

namespace App\Modules\BlogCategory\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends BaseModel
{
    use SoftDeletes;

    protected $table = 'blogs_categories';

    protected $guarded = [];
}
