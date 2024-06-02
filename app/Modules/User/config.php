use App\Bll\Constants;
use App\Modules\User\Models\User;

return [
    'allow_edit' => true,
    'title' => 'Users',
    'route' => 'user',
    'base_route' => route('dashboard.user.index'),
    'createTitle' => 'Create User',
    'editTitle' => 'Edit User',
    'baseModel' => User::query(),
    'uploads' => Constants::UserPath,
    'columns' => [
        [
            'label' => 'ID',
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
            'label' => 'Name',
            'name' => 'name',
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'base',
            'showInForm' => true,
            'required' => true,
            'placeholder' => 'Name',
        ],
        [
            'label' => 'Email',
            'name' => 'email',
            'type' => 'email',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'base',
            'showInForm' => true,
            'required' => true,
            'placeholder' => 'Email',
        ],
        [
            'label' => 'Password',
            'name' => 'password',
            'type' => 'password',
            'searchable' => false,
            'sortable' => false,
            'editable' => true,
            'model' => 'base',
            'showInForm' => true,
            'required' => true,
            'placeholder' => 'Password',
        ],
    ],
    'validation' => [
        'rules' => [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ],
        'messages' => [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Email is already exists',
            'password.required' => 'Password is required',
        ]
    ]
];
