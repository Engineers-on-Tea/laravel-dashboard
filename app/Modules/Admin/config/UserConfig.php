<?php

use App\Bll\Constants;
use App\Modules\Home\Models\User;

return [
    'allow_edit' => true,
    'title' => ('Users'),
    'route' => 'user',
    'base_route' => route('dashboard.user.index'),
    'createTitle' => ('Create User'),
    'editTitle' => ('Edit User'),
    'baseModel' => User::query(),
    'uploads' => Constants::UserPath,
    'columns' => [
        [
            'label' => ('ID'),
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
            'label' => ('Name'),
            'name' => 'name',
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'base',
            'showInForm' => true,
            'required' => true,
            'placeholder' => ('Name'),
        ],
        [
            'label' => ('Email'),
            'name' => 'email',
            'type' => 'email',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'base',
            'showInForm' => true,
            'required' => true,
            'placeholder' => ('Email'),
        ],
        [
            'label' => ('Status'),
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
            'label' => ('Created At'),
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
            'label' => ('Options'),
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
