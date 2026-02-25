<?php

return [
    [
        'key'    => 'nexora',
        'name'   => 'Nexora Settings',
        'sort'   => 1,
    ],
    [
        'key'    => 'nexora.settings',
        'name'   => 'General',
        'sort'   => 1,
    ],
    [
        'key'    => 'nexora.settings.general',
        'name'   => 'Nexora Configuration',
        'sort'   => 1,
        'fields' => [
            [
                'name'          => 'license_key',
                'title'         => 'License Key',
                'type'          => 'text',
                'validation'    => 'required',
                'channel_based' => true,
                'locale_based'  => false,
            ],
            [
                'name'          => 'cache_enabled',
                'title'         => 'Enable Caching',
                'type'          => 'boolean',
                'channel_based' => true,
                'locale_based'  => false,
            ],
        ],
    ]
];
