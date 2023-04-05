<?php

return [
    'baseModel' => \App\Modules\BlogCategory\Models\BlogCategory::query(),
    'dataModel' => \App\Modules\BlogCategory\Models\BlogCategoryData::query(),
    'allow_edit' => true,
    'base_route' => route('dashboard.blog-category.index'),
    'route' => 'blog-category',
    'form' => 'admin.components.blog-category.form',
    'title' => ('Blog Categories'),
    'createTitle' => ('Create Blog Category'),
    'editTitle' => ('Edit Blog Category'),
    'uploads' => \App\Bll\Constants::BlogCategoryPath,
    'columns' => [
        'id' => [
            'label' => ('ID'),
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => false,
            'model' => 'base',
        ],
        'image' => [
            'label' => ('Image'),
            'type' => 'image',
            'searchable' => false,
            'sortable' => false,
            'editable' => true,
            'model' => 'base',
        ],
        'slug' => [
            'label' => ('Slug'),
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'base',
        ],
        'title' => [
            'label' => ('Title'),
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'data',
        ],
        'description' => [
            'label' => ('Description'),
            'type' => 'description',
            'searchable' => true,
            'sortable' => true,
            'editable' => true,
            'model' => 'data',
        ],
        'created_at' => [
            'label' => ('Created At'),
            'type' => 'text',
            'searchable' => true,
            'sortable' => true,
            'editable' => false,
            'model' => 'base',
        ],
        'action' => [
            'label' => ('Options'),
            'type' => 'action',
            'searchable' => false,
            'sortable' => false,
            'editable' => false,
            'model' => 'action',
            'data' => [
                'edit' => 'admin.components.buttons.edit',
                'delete' => 'admin.components.buttons.delete',
            ],
        ],
    ],
    'validation' => [
        'rules' => [
            'title' => 'required|string|max:255|min:3',
            'description' => 'required|string|max:255|min:3',
            'image' => 'required|image|mimetypes:image/jpeg,image/png,image/gif,image/jpg',
            'lang_id' => 'required|integer',
        ],
        'messages' => [
            'title.required' => ('Title is required'),
            'description.required' => ('Description is required'),
            'image.required' => ('Image is required'),
            'image.image' => ('Image is not valid'),
        ]
    ]
];
