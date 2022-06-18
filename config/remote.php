<?php
// Config for Rafa1944/Remote
return [
    'hosts' => [
        'default' => [
            'host' => env('REMOTE_HOST'),
            'port' => env('REMOTE_PORT',22),
            'user' => env('REMOTE_USER'),
            'path' => env('REMOTE_PATH'),
        ]
    ],

    'command-aliases' => [
        'clear-all-caches' => [
            'php artisan clear:cache',
            'php artisan Config:cache',
            'php artisan view:cache'
        ]
    ]
];
