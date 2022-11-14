<?php

namespace App\Modules\Country\Controllers;

use App\Modules\Admin\Controllers\DashboardController;
use JetBrains\PhpStorm\NoReturn;

class CountryController extends DashboardController
{
    #[NoReturn] public function __construct()
    {
        $this->config = require_once(app_path('Modules/Country/config.php'));
        parent::__construct();
    }
}
