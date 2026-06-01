<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['GET', 'POST'],

    'allowed_origins' => array_filter(
        explode(',', env('CORS_ALLOWED_ORIGINS', env('APP_URL', 'http://localhost')))
    ),

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['Content-Type', 'X-Requested-With', 'X-CSRF-TOKEN', 'Accept', 'Authorization'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,
];
