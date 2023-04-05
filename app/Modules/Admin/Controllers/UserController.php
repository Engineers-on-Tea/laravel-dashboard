<?php

namespace App\Modules\Admin\Controllers;


use JetBrains\PhpStorm\NoReturn;

class UserController extends DashboardController
{
    public function __construct()
    {
        $this->config = require_once(app_path('Modules/Admin/config/UserConfig.php'));
        parent::__construct();
    }
}
