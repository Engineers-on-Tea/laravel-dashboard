<?php

namespace App\Modules\BlogCategory\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Modules\Admin\Controllers\DashboardController;

class BlogCategoryController extends DashboardController
{
    public function __construct()
    {
        $this->config = require_once(app_path('Modules/BlogCategory/config/BlogCategoryConfig.php'));

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
            'description' => 'required|string|max:255|min:3',
            'image' => 'required|image|mimetypes:image/jpeg,image/png,image/gif,image/jpg',
            'lang_id' => 'required|integer',
        ], [
            'title.required' => _i('Title is required'),
            'description.required' => _i('Description is required'),
            'image.required' => _i('Image is required'),
            'image.image' => _i('Image is not valid'),
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
