<?php

namespace App\Modules\BlogCategory\Controllers;

use App\Modules\Admin\Controllers\DashboardController;

class BlogCategoryController extends DashboardController
{
    public function __construct()
    {
        $this->config = require_once(app_path('Modules/BlogCategory/config.php'));
        parent::__construct();
    }
}
