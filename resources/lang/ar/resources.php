<?php

return [
    'products' => [
        'label' => 'منتج',
        'plural' => 'المنتجات',
        'navigation' => [
            'label' => 'المنتجات',
            'group' => 'الإدارة',
        ],
        'pages' => [
            'index' => ['title' => 'كل المنتجات'],
            'create' => ['title' => 'إنشاء منتج'],
            'edit' => ['title' => 'تعديل المنتج'],
        ],
        'fields' => [
            'name' => 'اسم المنتج',
            'description' => 'الوصف',
            'price' => 'السعر',
            'stock' => 'المخزون',
            'image' => 'الصورة',
            'owner' => [
                'name' => 'اسم المالك',
                'email' => 'البريد الإلكتروني',
            ],
            'view' => 'عرض المنتج',
        ],
    ],

    'activity-logs' => [
        'label' => 'سجل النشاط',
        'plural' => 'سجلات الأنشطة',
        'navigation' => [
            'label' => 'سجل النشاط',
            'group' => 'الإدارة',
        ],
        'fields' => [
            'causer_id' => 'المستخدم',
            'description' => 'العملية',
            'subject_type' => 'النموذج',
            'created_at' => 'التاريخ',
        ],
    ],
];
