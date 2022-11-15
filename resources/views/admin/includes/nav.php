<?php

return [
    'dashboard' => [
        'label' => _i('Dashboard'),
        'icon' => 'icofont-ui-home',
        'route' => route('dashboard.home'),
        'children' => [],
    ],
    'settings' => [
        'label' => _i('Main Settings'),
        'icon' => 'icofont-ui-settings',
        'route' => 'javascript:void(0)',
        'children' => [
            'user' => [
                'label' => _i('Users'),
                'icon' => 'icon-user',
                'route' => route('dashboard.user.index'),
                'children' => [],
            ],
            'language' => [
                'label' => _i('Languages'),
                'icon' => 'icon-flag',
                'route' => route('dashboard.language.index'),
                'children' => [],
            ],
            'country' => [
                'label' => _i('Countries'),
                'icon' => 'icon-flag',
                'route' => route('dashboard.country.index'),
                'children' => [],
            ],
            'city' => [
                'label' => _i('Cities'),
                'icon' => 'icon-flag',
                'route' => route('dashboard.city.index'),
                'children' => [],
            ],
        ]
    ],
    'blog' => [
        'label' => _i('Blog'),
        'icon' => 'icofont-file-text',
        'route' => 'javascript:void(0)',
        'children' => [
            'blog-category' => [
                'label' => _i('Blog Categories'),
                'icon' => 'icon-book',
                'route' => route('dashboard.blog-category.index'),
                'children' => [],
            ],
            'blog' => [
                'label' => _i('Blogs'),
                'icon' => 'icon-align-justify',
                'route' => route('dashboard.blog.index'),
                'children' => [],
            ],
        ]
    ],
];
