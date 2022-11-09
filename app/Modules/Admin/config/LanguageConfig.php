<?php

return [
    'allow_edit' => false,
    'title' => _i('Languages'),
    'route' => 'language',
    'baseModel' => \App\Modules\Admin\Models\Language::query(),
    'columns' => [
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
            'model' => 'base',
        ],
    ]
];
