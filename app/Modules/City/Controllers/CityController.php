<?php

namespace App\Modules\City\Controllers;

use App\Modules\Admin\Controllers\DashboardController;
use JetBrains\PhpStorm\NoReturn;

class CityController extends DashboardController
{
    #[NoReturn] public function __construct()
    {
        $this->config = require_once(app_path('Modules/City/config.php'));
        $this->parentModel = $this->config['parentModel'];
        $this->parentDataModel = $this->config['parentDataModel'];
        parent::__construct();
    }
}
