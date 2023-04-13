<?php

namespace App\Modules\City\Controllers;

use App\Modules\Admin\Controllers\DashboardController;

class CityController extends DashboardController
{
    public function __construct()
    {
        $this->config = require_once(app_path('Modules/City/config.php'));
        parent::__construct();
    }
}
