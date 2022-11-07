<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Modules\Admin\Models\City\City;
use App\Modules\Admin\Models\City\CityData;

class CityController extends DashboardController
{
    public function __construct()
    {
        parent::$model = City::query();
        parent::$dataModel = CityData::query();
        parent::__construct();
    }

    protected function index(Request $request)
    {
        return parent::index($request);
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
