<?php

return [
    'label' => 'Product',
    'plural' => 'Products',
    'navigation' => [
        'label' => 'Products',
        'group' => 'Management',
    ],
    'pages' => [
        'index' => [
            'title' => 'All Products',
        ],
        'create' => [
            'title' => 'Create Product',
        ],
        'edit' => [
            'title' => 'Edit Product',
        ],
    ],
    'fields' => [
        'name' => 'Product Name',
        'description' => 'Product Description',
        'price' => 'Product Price',
        'stock' => 'Stock',
        'image' => 'Product Image',
        'owner' => 'Product Owner',
    ],
];
