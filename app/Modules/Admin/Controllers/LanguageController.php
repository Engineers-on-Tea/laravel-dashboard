<?php

namespace App\Modules\Admin\Controllers;

class LanguageController extends DashboardController
{
    protected $config;

    public function __construct()
    {
        $this->config = require_once(app_path('Modules/Admin/config/LanguageConfig.php'));
        parent::__construct();
    }
}
