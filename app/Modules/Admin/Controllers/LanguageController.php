<?php

namespace App\Modules\Admin\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Modules\Admin\Controllers\DashboardController;

class LanguageController extends DashboardController
{
    public function __construct()
    {
        $this->columns = [
            'id' => [
                'label' => _i('ID'),
                'type' => 'text',
                'searchable' => true,
                'sortable' => true,
                'editable' => false,
                'model' => 'base',
            ],
            'title' => [
                'label' => _i('Title'),
                'type' => 'text',
                'searchable' => true,
                'sortable' => true,
                'editable' => true,
                'model' => 'base',
            ],
            'code' => [
                'label' => _i('Code'),
                'type' => 'text',
                'searchable' => true,
                'sortable' => true,
                'editable' => true,
                'model' => 'base',
            ],
            'is_default' => [
                'label' => _i('Default'),
                'type' => 'text',
                'searchable' => true,
                'sortable' => true,
                'editable' => true,
                'model' => 'base',
            ],
            'created_at' => [
                'label' => _i('Created At'),
                'type' => 'text',
                'searchable' => true,
                'sortable' => true,
                'editable' => false,
            ],
        ];
        $this->model = Language::query();
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
