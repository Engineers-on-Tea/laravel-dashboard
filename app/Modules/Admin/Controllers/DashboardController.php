<?php

namespace App\Modules\Admin\Controllers;

use App\Bll\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Language;

class DashboardController extends Controller
{
    protected $columns = [];

    protected $model = null;
    protected $dataModel = null;
    protected $parentModel = null;
    protected $parentDataModel = null;

    protected $allow_edit;
    protected $route;

    protected $config;

    public function __construct()
    {
    }

    protected function home()
    {
        $pageTitle = '';
        return view('admin.home', [
            'pageTitle' => $pageTitle,
        ]);
    }

    protected function changeLanguage($language)
    {
        $lang = Language::query()
            ->findOrFail($language);

        session()->forget('admin_lang');

        session()->put('admin_lang', $lang);

        return redirect()->back();
    }

    protected function index(Request $request)
    {
        $content = $this->model;

        $pageTitle = $this->config['title'];

        if ($this->dataModel != null) {
            $content = $content->with(['AdminTranslated']);
        }

        $content = $content->paginate(10);

        $columns = $this->columns;

        $data = [
            'content' => $content,
            'columns' => $columns,
            'pageTitle' => $pageTitle,
            'allowEdit' => $this->allow_edit,
            'route' => $this->route,
        ];

        if ($request->ajax()) {
            return view('admin.includes.table', $data);
        } else {
            return view('admin.index', $data);
        }
    }

    protected function create(Request $request)
    {
        $data = [
            'pageTitle' => $this->config['createTitle'],
            'route' => $this->route,
            'method' => 'POST',
            'action' => 'store',
            'item' => null,
            'baseRoute' => $this->config['base_route'],
            'baseTitle' => $this->config['title'],
            'form' => $this->config['form']
        ];

        return view('admin.create', $data);
    }

    protected function store(Request $request)
    {
        // filter column names from colums having model base
        $baseColums = [];
        foreach ($this->columns as $key => $column) {
            if (isset($column['model']) && $column['model'] == 'base' && $column['editable'] == true) {
                $baseColums[$key] = $column;
            }
        }
        $baseColums = array_keys($baseColums);
        $newBase = $this->model->create($request->only($baseColums));

        // get column names from colums having model data
        $dataColums = [];
        foreach ($this->columns as $key => $column) {
            if ($column['model'] == 'data' && $column['editable'] == true) {
                $dataColums[] = $key;
            }
        }
        // append master id to request
        $request->merge(['master_id' => $newBase->id, 'lang_id' => Lang::getAdminLangId()]);
        array_push($dataColums, 'master_id');
        array_push($dataColums, 'lang_id');

        $newData = $this->dataModel->create($request->only($dataColums));

        $response = [
            'title' => _i('Success'),
            'message' => _i('New record created successfully'),
        ];

        return response()->json($response, 200);
    }

    protected function show(Request $request)
    {
        $item = $this->model->with([
            'AdminTranslated'
        ])->findOrFail($request->input('id'));
    }

    protected function edit($id)
    {
        $item = $this->model->with([
            'AdminTranslated'
        ])->findOrFail($id);

        $data = [
            'pageTitle' => $this->config['editTitle'],
            'route' => $this->route,
            'method' => 'PUT',
            'action' => 'update',
            'item' => $item,
            'baseRoute' => $this->config['base_route'],
            'baseTitle' => $this->config['title'],
            'form' => $this->config['form']
        ];

        return view('admin.edit', $data);
    }

    protected function update(Request $request)
    {
        $item = $this->model->findOrFail($request->input('id'));

        // filter column names from colums having model base
        $baseColums = [];
        foreach ($this->columns as $key => $column) {
            if (isset($column['model']) && $column['model'] == 'base') {
                $baseColums[$key] = $column;
            }
        }
        $baseColums = array_keys($baseColums);
        $item->update($request->only($baseColums));

        // get column names from colums having model data
        $dataColums = [];
        foreach ($this->columns as $key => $column) {
            if ($column['model'] == 'data') {
                $dataColums[] = $key;
            }
        }
        $this->dataModel->where([
            'master_id' => $item->id,
            'lang_id' => Lang::getAdminLangId()
        ])->update($request->only($dataColums));

        $response = [
            'title' => _i('Success'),
            'message' => _i('Record updated successfully'),
        ];

        return response()->json($response, 200);
    }

    protected function destroy($id)
    {
        $statusCode = 200;
        $response = [
            'title' => _i('Success'),
            'message' => _i('Deleted Successfully'),
            'fail' => false,
        ];
        try {
            $this->model->where('id', $id)->delete();
        } catch (\Exception $e) {
            $statusCode = 500;
            $response = [
                'title' => _i('Error'),
                'message' => _i('Error Deleting'),
                'fail' => true,
            ];
        }

        return response()->json(['data' => $response], $statusCode);
    }

    protected function restore(Request $request)
    {
        $statusCode = 200;
        $response = [
            'message' => _i('Restored Successfully'),
            'fail' => false,
        ];
        try {
            $this->model->where('id', $request->get('id'))->restore();
        } catch (\Exception $e) {
            $statusCode = 500;
            $response = [
                'message' => _i('Error Restoring'),
                'fail' => true,
            ];
        }

        return response()->json($response, $statusCode);
    }

    protected function forceDelete(Request $request)
    {
        $statusCode = 200;
        $response = [
            'message' => _i('Deleted Successfully'),
            'fail' => false,
        ];
        try {
            $this->model->where('id', $request->get('id'))->forceDelete();
        } catch (\Exception $e) {
            $statusCode = 500;
            $response = [
                'message' => _i('Error Deleting'),
                'fail' => true,
            ];
        }

        return response()->json($response, $statusCode);
    }

    protected function getTranslation(Request $request)
    {
        $lang = $request->input('lang');
        $id = $request->input('id');

        $data = $this->dataModel->where('master_id', $id)
            ->where('lang_id', $lang)
            ->first();

        return response()->json([
            'data' => $data,
        ]);
    }

    protected function setTranslation(Request $request)
    {
        $lang = $request->input('lang');
        $id = $request->input('id');

        $data = $this->dataModel->where('master_id', $id)
            ->where('lang_id', $lang)
            ->first();

        if ($data) {
            $data->update($request->all());
        } else {
            $this->dataModel->create($request->all());
        }

        return response()->json(['message' => _i('Translation saved successfully')]);
    }
}
