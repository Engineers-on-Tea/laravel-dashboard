<?php

return [
    'dashboard' => [
        'label' => _i('Dashboard'),
        'icon' => 'icon-home',
        'route' => route('dashboard.home'),
        'children' => [],
    ],
    'settings' => [
        'label' => _i('Main Settings'),
        'icon' => 'icon-settings',
        'route' => 'javascript:void(0)',
        'children' => [
            'language' => [
                'label' => _i('Languages'),
                'icon' => 'icon-flag',
                'route' => route('dashboard.language.index'),
                'hasChild' => false,
            ],
            'country' => [
                'label' => _i('Countries'),
                'icon' => 'icon-flag',
                'route' => route('dashboard.country.index'),
                'hasChild' => false,
            ],
        ]
    ]
];
