<?php

namespace App\Modules\City\Controllers;

use Illuminate\Http\Request;
use App\Modules\Admin\Controllers\DashboardController;
use Illuminate\Support\Facades\Validator;

class CityController extends DashboardController
{
    public function __construct()
    {
        $this->config = require_once(app_path('Modules/City/config/CityConfig.php'));
        
        $this->model = $this->config['baseModel'];
        $this->dataModel = $this->config['dataModel'];
        $this->parentModel = $this->config['parentModel'];
        $this->parentDataModel = $this->config['parentDataModel'];

        $this->columns = $this->config['columns'];
        $this->allow_edit = $this->config['allow_edit'];
        $this->route = $this->config['route'];

        parent::__construct();
    }

    protected function index(Request $request)
    {
        return parent::index($request);
    }

    protected function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|min:3',
            'country_id' => 'required|exists:countries,id',
            'lang_id' => 'required|integer',
        ], [
            'title.required' => _i('Title is required'),
            'country_id.required' => _i('Country is required'),
            'country_id.exists' => _i('Country does not exists'),
        ]);

        if ($validator->fails()) {
            $errors = '';
            foreach ($validator->errors()->all() as $error) {
                $errors .= $error . ', ';
            }
            $response = [
                'title' => _i('Error'),
                'message' => $errors,
            ];

            return response()->json($response, 422);
        }

        return parent::store($request);
    }
}
