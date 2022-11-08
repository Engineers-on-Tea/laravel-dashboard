<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Modules\Admin\Controllers\DashboardController;

class LanguageController extends DashboardController
{
    protected $config;

    public function __construct()
    {
        $this->config = require_once(app_path('Modules/Admin/config/LanguageConfig.php'));
        $this->model = $this->config['baseModel'];
        $this->columns = $this->config['columns'];

        $this->allow_edit = $this->config['allow_edit'];
        $this->route = $this->config['route'];
        
        parent::__construct();
    }

    protected function index(Request $request, $pageTitle = null)
    {
        $pageTitle = _i('Languages');
        return parent::index($request, $pageTitle);
    }

    protected function create(Request $request)
    {
    }

    protected function store(Request $request)
    {
    }

    protected function show(Request $request)
    {
    }

    protected function edit(Request $request)
    {
    }

    protected function update(Request $request)
    {
    }

    protected function destroy(Request $request)
    {
    }

    protected function restore(Request $request)
    {
    }

    protected function forceDelete(Request $request)
    {
    }

    protected function getTranslation(Request $request)
    {
    }

    protected function setTranslation(Request $request)
    {
    }
}
