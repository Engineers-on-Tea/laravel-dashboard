## About Laravel Dashboard

Laravel Dashboard is a free admin dashboard template built with adminty template. It is a fully responsive bootstrap admin template built with Bootstrap 4 Framework, HTML5, CSS and JQuery. It has a huge collection of reusable UI components and integrated with latest jQuery plugins. It can be used for all type of web applications like custom admin panel, project management system, admin dashboard, application backend, CMS, CRM, business website, corporate, portfolio, blog, etc.

### More info will be added soon.

> This is still work in progress and subject to change.

### Main Features

- Fully Responsive
- Built with Bootstrap 4
- Blade Template
- Authentication
- Spatie Permission
- RTL Support
- Configurable Sidebar
- Configurable CRUD controllers, models with a simple array!

### How to configure for anything

```php
use App\Bll\Constants;
use App\Modules\Country\Models\Country;
use App\Modules\Country\Models\CountryData;

return [
    'baseModel' => Country::query(),
    'dataModel' => CountryData::query(),
    'allow_edit' => true,
    'base_route' => route('dashboard.country.index'),
    'route' => 'country',
    'title' => _i('Countries'),
    'createTitle' => _i('Create Country'),
    'editTitle' => _i('Edit Country'),
    'uploads' => Constants::CountryPath,
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
            'placeholder' => _i('Country Title'),
            'required' => true,
            'showInForm' => true,
        ],
        [
            'name' => 'dialing_code',
            'type' => 'text',
            'model' => 'base',
            'label' => _i('Phone Code'),
            'editable' => true,
            'searchable' => true,
            'sortable' => true,
            'placeholder' => _i('Country Phone Code'),
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
            'name' => 'created_at',
            'type' => 'text',
            'model' => 'base',
            'label' => _i('Created At'),
            'editable' => false,
            'searchable' => false,
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
            'code' => 'required|string|max:10|min:2|unique:countries,code',
            'dialing_code' => 'required|string|max:10|min:2|unique:countries,dialing_code',
            'lang_id' => 'required|integer',
        ],
        'messages' => [
            'title.required' => _i('Title is required'),
            'code.required' => _i('Code is required'),
            'code.unique' => _i('Code is already exists'),
            'dialing_code.required' => _i('Dialing code is required'),
            'dialing_code.unique' => _i('Dialing code is already exists'),
        ]
    ]
];
```

The above configuration is for the country module, you can configure any module with the same configuration, you just create your controller and have it extend the `App\Modules\Admin\Controllers\DashboardController` and your models to extend the `App\Models\BaseModel` and you are good to go.

Create a `config.php` file in your module folder and add the above configuration.

You'll have your controller like this

```php
class CountryController extends DashboardController
{
    #[NoReturn] public function __construct()
    {
        $this->config = require_once(app_path('Modules/Country/config.php'));
        parent::__construct();
    }
}
```

All the crud logic is already written in the `DashboardController` so you don't have to write anything, just extend the `DashboardController` and you are good to go.
