<?php

use App\Bll\Constants;
use App\Modules\Admin\Models\Language;

return [
    'allow_edit' => false,
    'title' => _i('Languages'),
    'route' => 'language',
    'baseModel' => Language::query(),
    'uploads' => Constants::LanguagePath,
    'columns' => [
        [
            'label' => _i('ID'),
            'name' => 'id',
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => false,
            'model' => 'base',
        ],
        [
            'label' => _i('Title'),
            'name' => 'title',
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'base',
        ],
        [
            'label' => _i('Code'),
            'name' => 'code',
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'base',
        ],
        [
            'label' => _i('Default'),
            'name' => 'is_default',
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'base',
        ],
        [
            'label' => _i('Created At'),
            'name' => 'created_at',
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => false,
            'model' => 'base',
        ],
    ]
];
