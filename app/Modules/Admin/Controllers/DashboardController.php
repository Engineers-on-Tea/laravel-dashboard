<?php

namespace App\Modules\Admin\Controllers;

use App\Bll\Lang;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Language;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    protected array $columns = [];

    protected Model|null $model = null;
    protected Model|null $dataModel = null;
    protected Model|null $parentModel = null;
    protected Model|null $parentDataModel = null;

    protected bool $allow_edit;
    protected string $route;

    protected array $config;

    public function __construct()
    {
        $this->model = $this->config['baseModel'];
        $this->dataModel = $this->config['dataModel'];
        $this->columns = $this->config['columns'];

        $this->allow_edit = $this->config['allow_edit'];
        $this->route = $this->config['route'];
    }

    protected function home(): Factory|View|Application
    {
        $pageTitle = '';
        return view('admin.home', [
            'pageTitle' => $pageTitle,
        ]);
    }

    /**
     * @param string $language
     * @return RedirectResponse
     */
    protected function changeLanguage(string $language): RedirectResponse
    {
        $lang = Language::query()
            ->findOrFail($language);

        session()->forget('admin_lang');

        session()->put('admin_lang', $lang);

        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    protected function index(Request $request): View|Factory|Application
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

    /**
     * @return Application|Factory|View
     */
    protected function create(): View|Factory|Application
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

    protected function store(Request $request): JsonResponse
    {
        $validate = $this->validateRequest($request);
        if ($validate['fail']) return response()->json($validate['response'], 422);

        // filter column names from columns having model base
        $baseColumns = [];
        foreach ($this->columns as $column) {
            if (isset($column['model']) && ($column['model'] == 'base' || $column['model'] == 'parentData') && $column['editable']) {
                $baseColumns[] = $column['name'];
            }
        }
        $newBase = $this->model->create($request->only($baseColumns));

        // get column names from columns having model data
        $dataColumns = [];
        foreach ($this->columns as $column) {
            if ($column['model'] == 'data' && $column['editable']) {
                $dataColumns[] = $column['name'];
            }
        }
        // append master id to request
        $request->merge(['master_id' => $newBase->id, 'lang_id' => Lang::getAdminLangId()]);
        $dataColumns[] = 'master_id';
        $dataColumns[] = 'lang_id';

        $this->dataModel->create($request->only($dataColumns));

        if ($request->has('image')) {
            $this->saveImage($request->file('image'), $newBase->id);
        }

        $response = [
            'title' => _i('Success'),
            'message' => _i('New record created successfully'),
        ];

        return response()->json($response);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    protected function show(Request $request): View|Factory|Application
    {
        $item = $this->model->with([
            'Data'
        ])->findOrFail($request->input('id'));

        $data = [
            'pageTitle' => $this->config['showTitle'],
            'route' => $this->route,
            'method' => 'GET',
            'action' => 'show',
            'item' => $item,
            'baseRoute' => $this->config['base_route'],
            'baseTitle' => $this->config['title'],
            'columns' => $this->columns,
        ];

        return view('admin.show', $data);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    protected function edit($id): View|Factory|Application
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

    /**
     * @param Request $request
     * @return JsonResponse
     */
    protected function update(Request $request): JsonResponse
    {
        $validate = $this->validateRequest($request);
        if ($validate['fail']) return response()->json($validate['response'], 422);

        $item = $this->model->findOrFail($request->input('id'));

        // filter column names from columns having model base
        $baseColumns = [];
        foreach ($this->columns as $column) {
            if (isset($column['model']) && ($column['model'] == 'base' || $column['model'] == 'parentData') && $column['editable']) {
                $baseColumns[] = $column['name'];
            }
        }
        $item->update($request->only($baseColumns));

        // get column names from columns having model data
        $dataColumns = [];
        foreach ($this->columns as $column) {
            if ($column['model'] == 'data' && $column['editable']) {
                $dataColumns[] = $column['name'];
            }
        }
        $this->dataModel->updateOrCreate([
            'master_id' => $item->id,
            'lang_id' => Lang::getAdminLangId()
        ], $request->only($dataColumns));

        $response = [
            'title' => _i('Success'),
            'message' => _i('Record updated successfully'),
        ];

        return response()->json($response);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    protected function destroy($id): JsonResponse
    {
        $statusCode = 200;
        $response = [
            'title' => _i('Success'),
            'message' => _i('Deleted Successfully'),
            'fail' => false,
        ];
        try {
            $this->model->where('id', $id)->delete();
        } catch (Exception $e) {
            $statusCode = 500;
            $response = [
                'title' => _i('Error'),
                'message' => _i('Error Deleting'),
                'fail' => true,
            ];
        }

        return response()->json(['data' => $response], $statusCode);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    protected function restore(Request $request): JsonResponse
    {
        $statusCode = 200;
        $response = [
            'message' => _i('Restored Successfully'),
            'fail' => false,
        ];
        try {
            $this->model->where('id', $request->get('id'))->restore();
        } catch (Exception $e) {
            $statusCode = 500;
            $response = [
                'message' => _i('Error Restoring'),
                'fail' => true,
            ];
        }

        return response()->json($response, $statusCode);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    protected function forceDelete(Request $request): JsonResponse
    {
        $statusCode = 200;
        $response = [
            'message' => _i('Deleted Successfully'),
            'fail' => false,
        ];
        try {
            $this->model->where('id', $request->get('id'))->forceDelete();
        } catch (Exception $e) {
            $statusCode = 500;
            $response = [
                'message' => _i('Error Deleting'),
                'fail' => true,
            ];
        }

        return response()->json($response, $statusCode);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    protected function getTranslation(Request $request): JsonResponse
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

    /**
     * @param Request $request
     * @return JsonResponse
     */
    protected function setTranslation(Request $request): JsonResponse
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

    /**
     * @param $file
     * @param $id
     * @return void
     */
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

    /**
     * @param Request $request
     * @return array
     */
    private function validateRequest(Request $request): array
    {
        $validation = $this->config['validation'];
        $validator = Validator::make($request->all(), $validation['rules'], $validation['messages']);

        $res = [
            'fail' => false,
            'response' => [],
        ];

        if ($validator->fails()) {
            $errors = '';
            foreach ($validator->errors()->all() as $error) {
                $errors .= $error . ', ';
            }

            $response = [
                'title' => _i('Error'),
                'message' => $errors,
            ];

            $res['fail'] = true;
            $res['response'] = $response;
        }

        return $res;
    }
}
