<?php

use App\Bll\Constants;
use App\Modules\Home\Models\User;

return [
    'allow_edit' => true,
    'title' => _i('Users'),
    'route' => 'user',
    'base_route' => route('dashboard.user.index'),
    'createTitle' => _i('Create User'),
    'editTitle' => _i('Edit User'),
    'baseModel' => User::query(),
    'uploads' => Constants::UserPath,
    'columns' => [
        [
            'label' => _i('ID'),
            'name' => 'id',
            'type' => 'hidden',
            'searchable' => true,
            'sortable' => true,
            'editable' => false,
            'model' => 'base',
            'required' => true,
            'showInForm' => false,
        ],
        [
            'label' => _i('Name'),
            'name' => 'name',
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'base',
            'showInForm' => true,
            'required' => true,
            'placeholder' => _i('Name'),
        ],
        [
            'label' => _i('Email'),
            'name' => 'email',
            'type' => 'email',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'base',
            'showInForm' => true,
            'required' => true,
            'placeholder' => _i('Email'),
        ],
        [
            'label' => _i('Status'),
            'name' => 'active',
            'type' => 'checkbox',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'base',
            'showInForm' => true,
            'required' => true,
        ],
        [
            'label' => _i('Created At'),
            'name' => 'created_at',
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => false,
            'model' => 'base',
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
    ]
];
