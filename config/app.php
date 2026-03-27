<?php

return [
    'name' => env('APP_NAME', 'SoftyFact'),
    'env' => env('APP_ENV', 'production'),
    'debug' => (bool) env('APP_DEBUG', false),
    'url' => env('APP_URL', 'https://softyfact.tn'),
    'timezone' => 'Africa/Tunis',
    'locale' => 'fr',
    'fallback_locale' => 'fr',
    'faker_locale' => 'fr_FR',
    'cipher' => 'AES-256-CBC',
    'key' => env('APP_KEY'),
    'maintenance' => [
        'driver' => 'file',
    ],
    'providers' => [],

    // Custom config
    'support_phone' => env('APP_SUPPORT_PHONE', '71 000 000'),
    'order_amount' => (int) env('APP_ORDER_AMOUNT', 149),
    'order_amount_online' => (int) env('APP_ORDER_AMOUNT_ONLINE', 99),
    'core_app_url' => env('CORE_APP_URL', 'https://app.softyfact.tn'),
];
