<?php

use App\Bll\Constants;
use App\Modules\Admin\Models\Language;

return [
    'allow_edit' => false,
    'title' => ('Languages'),
    'route' => 'language',
    'baseModel' => Language::query(),
    'uploads' => Constants::LanguagePath,
    'columns' => [
        [
            'label' => ('ID'),
            'name' => 'id',
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => false,
            'model' => 'base',
        ],
        [
            'label' => ('Title'),
            'name' => 'title',
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'base',
        ],
        [
            'label' => ('Code'),
            'name' => 'code',
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'base',
        ],
        [
            'label' => ('Default'),
            'name' => 'is_default',
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'base',
        ],
        [
            'label' => ('Created At'),
            'name' => 'created_at',
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => false,
            'model' => 'base',
        ],
    ]
];
