<?php

namespace App\Modules\Country\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Modules\Admin\Controllers\DashboardController;

class CountryController extends DashboardController
{
    protected $config;
    public function __construct()
    {
        $this->config = require_once(app_path('Modules/Country/config/CountryConfig.php'));

        $this->model = $this->config['baseModel'];
        $this->dataModel = $this->config['dataModel'];
        $this->columns = $this->config['columns'];

        $this->allow_edit = $this->config['allow_edit'];
        $this->route = $this->config['route'];

        parent::__construct();
    }

    protected function index(Request $request, $pageTitle = null)
    {
        $pageTitle = _i('Countries');
        return parent::index($request, $pageTitle);
    }

    protected function create(Request $request)
    {
        return parent::create($request);
    }

    protected function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:3',
            'code' => 'required|string|max:10|min:2',
            'dialing_code' => 'required|string|max:10|min:2',
            'lat' => 'float',
            'lng' => 'float',
            'lang_id' => 'required|integer',
        ]);

        return parent::store($request);
    }

    protected function show(Request $request)
    {
        return parent::show($request);
    }

    protected function edit(Request $request)
    {
        return parent::edit($request);
    }

    protected function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|min:3',
            'code' => 'required|string|max:10|min:2',
            'dialing_code' => 'required|string|max:10|min:2',
            'lat' => 'float',
            'lng' => 'float',
            'lang_id' => 'required|integer',
        ]);

        return parent::update($request);
    }

    protected function destroy(Request $request)
    {
        return parent::destroy($request);
    }

    protected function restore(Request $request)
    {
        return parent::restore($request);
    }

    protected function forceDelete(Request $request)
    {
        return parent::forceDelete($request);
    }

    protected function getTranslation(Request $request)
    {
        return parent::getTranslation($request);
    }

    protected function setTranslation(Request $request)
    {
        return parent::setTranslation($request);
    }
}
