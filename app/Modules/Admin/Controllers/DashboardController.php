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
            $content = $content->with(['Data']);
        }

        if ($this->parentModel != null) {
            $content = $content->with(['Parent.Data']);
        }

        $content = $content->paginate(10);

        $columns = $this->columns;

        $data = [
            'content' => $content,
            'columns' => $columns,
            'pageTitle' => $pageTitle,
            'allowEdit' => $this->allow_edit,
            'route' => $this->route,
            'uploads' => $this->config['uploads'],
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
            'columns' => $this->columns,
        ];

        return view('admin.create', $data);
    }

    protected function store(Request $request)
    {
        // filter column names from colums having model base
        $baseColums = [];
        foreach ($this->columns as $key => $column) {
            if (isset($column['model']) && ($column['model'] == 'base' || $column['model'] == 'parentData') && $column['editable'] == true) {
                $baseColums[] = $column['name'];
            }
        }
        $newBase = $this->model->create($request->only($baseColums));

        // get column names from colums having model data
        $dataColums = [];
        foreach ($this->columns as $key => $column) {
            if ($column['model'] == 'data' && $column['editable'] == true) {
                $dataColums[] = $column['name'];
            }
        }
        // append master id to request
        $request->merge(['master_id' => $newBase->id, 'lang_id' => Lang::getAdminLangId()]);
        array_push($dataColums, 'master_id');
        array_push($dataColums, 'lang_id');

        $newData = $this->dataModel->create($request->only($dataColums));

        if ($request->has('image')) {
            $this->saveImage($request->file('image'), $newBase->id);
        }

        $response = [
            'title' => _i('Success'),
            'message' => _i('New record created successfully'),
        ];

        return response()->json($response, 200);
    }

    protected function show(Request $request)
    {
        $item = $this->model->with([
            'Data'
        ])->findOrFail($request->input('id'));
    }

    protected function edit($id)
    {
        $item = $this->model->with([
            'Data'
        ])->findOrFail($id);

        $data = [
            'pageTitle' => $this->config['editTitle'],
            'route' => $this->route,
            'method' => 'PUT',
            'action' => 'update',
            'item' => $item,
            'baseRoute' => $this->config['base_route'],
            'baseTitle' => $this->config['title'],
            'columns' => $this->columns,
        ];

        return view('admin.edit', $data);
    }

    protected function update(Request $request)
    {
        $item = $this->model->findOrFail($request->input('id'));

        // filter column names from colums having model base
        $baseColums = [];
        foreach ($this->columns as $key => $column) {
            if (isset($column['model']) && ($column['model'] == 'base' || $column['model'] == 'parentData') && $column['editable'] == true) {
                $baseColums[] = $column['name'];
            }
        }
        $item->update($request->only($baseColums));

        // get column names from colums having model data
        $dataColums = [];
        foreach ($this->columns as $key => $column) {
            if ($column['model'] == 'data' && $column['editable'] == true) {
                $dataColums[] = $column['name'];
            }
        }
        $this->dataModel->updateOrCreate([
            'master_id' => $item->id,
            'lang_id' => Lang::getAdminLangId()
        ], $request->only($dataColums));

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

    private function saveImage($file, $id)
    {
        $path = $this->config['uploads'];

        $path = public_path($path . $id . DIRECTORY_SEPARATOR);

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $fileName = $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();

        $file->move($path, $fileName);

        $this->model->where('id', $id)->update(['image' => $fileName]);
    }
}
