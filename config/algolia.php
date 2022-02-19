<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    */
    'default' => 'main',
    /*
    |--------------------------------------------------------------------------
    | Algolia Connections
    |--------------------------------------------------------------------------
    */
    'connections' => [
        'main' => [
            'id' => env('ALGOLIA_APP_ID', ''),
            'search_key' => env('ALGOLIA_SEARCH_KEY', ''),
            'key' => env('ALGOLIA_ADMIN_KEY', ''),
        ],
    ],
];