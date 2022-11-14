<?php

use App\Bll\Constants;
use App\Bll\Utility;
use App\Modules\City\Models\City;
use App\Modules\City\Models\CityData;
use App\Modules\Country\Models\Country;
use App\Modules\Country\Models\CountryData;

return [
    'baseModel' => City::query(),
    'dataModel' => CityData::query(),
    'parentModel' => Country::query(),
    'parentDataModel' => CountryData::query(),
    'allow_edit' => true,
    'base_route' => route('dashboard.city.index'),
    'route' => 'city',
    'title' => _i('Cities'),
    'createTitle' => _i('Create City'),
    'editTitle' => _i('Edit City'),
    'uploads' => Constants::CityPath,
    'columns' => [
        [
            'name' => 'id',
            'type' => 'hidden',
            'model' => 'base',
            'label' => _i('ID'),
            'editable' => false,
            'searchable' => false,
            'sortable' => true,
            'showInForm' => true,
            'required' => true,
        ],
        [
            'name' => 'title',
            'type' => 'text',
            'model' => 'data',
            'label' => _i('Title'),
            'editable' => true,
            'searchable' => true,
            'sortable' => true,
            'placeholder' => _i('City Title'),
            'required' => true,
            'showInForm' => true,
        ],
        [
            'name' => 'country_id',
            'type' => 'select',
            'model' => 'parentData',
            'label' => _i('Country'),
            'editable' => true,
            'searchable' => true,
            'sortable' => true,
            'data' => Utility::getDashboardCountries(),
            'placeholder' => _i('Select Country'),
            'required' => true,
            'showInForm' => true,
        ],
        [
            'name' => 'status',
            'type' => 'checkbox',
            'model' => 'base',
            'label' => _i('Status'),
            'editable' => true,
            'searchable' => true,
            'sortable' => true,
            'required' => true,
            'showInForm' => true,
        ],
        [
            'name' => 'lat',
            'type' => 'number',
            'model' => 'base',
            'label' => _i('Latitude'),
            'editable' => true,
            'searchable' => true,
            'sortable' => true,
            'placeholder' => _i('Latitude'),
            'required' => true,
            'showInForm' => true,
        ],
        [
            'name' => 'lng',
            'type' => 'number',
            'model' => 'base',
            'label' => _i('Longitude'),
            'editable' => true,
            'searchable' => true,
            'sortable' => true,
            'placeholder' => _i('Longitude'),
            'required' => true,
            'showInForm' => true,
        ],
        [
            'name' => 'created_at',
            'type' => 'text',
            'model' => 'base',
            'label' => _i('Created At'),
            'editable' => false,
            'searchable' => true,
            'sortable' => true,
            'showInForm' => false,
        ],
        [
            'name' => 'action',
            'type' => 'action',
            'model' => 'action',
            'label' => _i('Options'),
            'editable' => false,
            'searchable' => false,
            'sortable' => false,
            'data' => [
                'edit' => 'admin.components.buttons.edit',
                'delete' => 'admin.components.buttons.delete',
            ],
            'showInForm' => false,
        ]
    ],
    'validation' => [
        'rules' => [
            'title' => 'required|string|max:255|min:3',
            'country_id' => 'required|exists:countries,id',
            'lang_id' => 'required|integer',
        ],
        'messages' => [
            'title.required' => _i('Title is required'),
            'country_id.required' => _i('Country is required'),
            'country_id.exists' => _i('Country does not exists'),
        ]
    ]
];
