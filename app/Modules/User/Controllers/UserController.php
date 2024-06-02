<?php

namespace App\Modules\User\Controllers;

use App\Modules\Admin\Controllers\DashboardController;
use Illuminate\Support\Facades\Config;

class UserController extends DashboardController
{
    public function __construct()
    {
        $this->config = Config::get('User');
        parent::__construct();
    }
}
