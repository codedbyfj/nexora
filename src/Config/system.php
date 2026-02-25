<?php

return [
    [
        'key'    => 'nexora',
        'name'   => 'nexora::app.admin.system.nexora',
        'sort'   => 1,
    ],
    [
        'key'    => 'nexora.settings',
        'name'   => 'nexora::app.admin.system.settings',
        'sort'   => 1,
    ],
    [
        'key'    => 'nexora.settings.general',
        'name'   => 'nexora::app.admin.system.configuration',
        'sort'   => 1,
        'fields' => [
            [
                'name'          => 'license_key',
                'title'         => 'nexora::app.admin.system.license-key',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => false,
            ],
            [
                'name'          => 'cache_enabled',
                'title'         => 'nexora::app.admin.system.cache-enabled',
                'type'          => 'boolean',
                'channel_based' => true,
                'locale_based'  => false,
            ],
        ],
    ]
];
