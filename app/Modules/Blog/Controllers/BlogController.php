<?php

namespace App\Modules\Blog\Controllers;

use App\Modules\Admin\Controllers\DashboardController;

class BlogController extends DashboardController
{
    public function __construct()
    {
        $this->config = require_once(app_path('Modules/Blog/config.php'));
        $this->parentModel = $this->config['parentModel'];
        $this->parentDataModel = $this->config['parentDataModel'];
        parent::__construct();
    }
}
