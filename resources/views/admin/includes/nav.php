<?php

return [
    'dashboard' => [
        'label' => ('Dashboard'),
        'icon' => 'icofont-ui-home',
        'route' => route('dashboard.home'),
        'children' => [],
    ],
    'settings' => [
        'label' => ('Main Settings'),
        'icon' => 'icofont-ui-settings',
        'route' => 'javascript:void(0)',
        'children' => [
            'user' => [
                'label' => ('Users'),
                'icon' => 'icon-user',
                'route' => route('dashboard.user.index'),
                'children' => [],
            ],
            'language' => [
                'label' => ('Languages'),
                'icon' => 'icon-flag',
                'route' => route('dashboard.language.index'),
                'children' => [],
            ],
            'country' => [
                'label' => ('Countries'),
                'icon' => 'icon-flag',
                'route' => route('dashboard.country.index'),
                'children' => [],
            ],
            'city' => [
                'label' => ('Cities'),
                'icon' => 'icon-flag',
                'route' => route('dashboard.city.index'),
                'children' => [],
            ],
        ]
    ],
    'blog' => [
        'label' => ('Blog'),
        'icon' => 'icofont-file-text',
        'route' => 'javascript:void(0)',
        'children' => [
            'blog-category' => [
                'label' => ('Blog Categories'),
                'icon' => 'icon-book',
                'route' => route('dashboard.blog-category.index'),
                'children' => [],
            ],
            'blog' => [
                'label' => ('Blogs'),
                'icon' => 'icon-align-justify',
                'route' => route('dashboard.blog.index'),
                'children' => [],
            ],
        ]
    ],
];
