<?php

namespace App\Modules\Country\Controllers;

use Illuminate\Http\Request;
use App\Modules\Admin\Controllers\DashboardController;
use Illuminate\Support\Facades\Validator;

class CountryController extends DashboardController
{
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

    protected function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|min:3',
            'code' => 'required|string|max:10|min:2|unique:countries,code',
            'dialing_code' => 'required|string|max:10|min:2|unique:countries,dialing_code',
            'lang_id' => 'required|integer',
        ], [
            'title.required' => _i('Title is required'),
            'code.required' => _i('Code is required'),
            'code.unique' => _i('Code is already exists'),
            'dialing_code.required' => _i('Dialing code is required'),
            'dialing_code.unique' => _i('Dialing code is already exists'),
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

    protected function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|min:3',
            'code' => 'required|string|max:10|min:2|unique:countries,code,' . $request->id,
            'dialing_code' => 'required|string|max:10|min:2|unique:countries,dialing_code,' . $request->id,
            'lang_id' => 'required|integer',
        ], [
            'title.required' => _i('Title is required'),
            'code.required' => _i('Code is required'),
            'code.unique' => _i('Code is already exists'),
            'dialing_code.required' => _i('Dialing code is required'),
            'dialing_code.unique' => _i('Dialing code is already exists'),
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

        return parent::update($request);
    }
}
