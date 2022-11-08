<?php

return [
    'allow_edit' => true,
    'route' => 'country',
    'baseModel' => \App\Modules\Country\Models\Country::query(),
    'dataModel' => \App\Modules\Country\Models\CountryData::query(),
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
            'model' => 'data',
        ],
        'code' => [
            'label' => _i('Code'),
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'base',
        ],
        'dialing_code' => [
            'label' => _i('Phone Code'),
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'base',
        ],
        'status' => [
            'label' => _i('Status'),
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'base',
        ],
        'lat' => [
            'label' => _i('Latitude'),
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'base',
        ],
        'lng' => [
            'label' => _i('Longitude'),
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
