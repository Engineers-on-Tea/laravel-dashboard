<?php

namespace App\Modules\Country\Controllers;

use App\Modules\Admin\Controllers\DashboardController;

class CountryController extends DashboardController
{
    public function __construct()
    {
        $this->config = require_once(app_path('Modules/Country/config.php'));
        parent::__construct();
    }
}
