<?php

return [
    'site' => [
        'site_url' => env('APP_URL', 'http://localhost'),
        'default_name' => env('APP_NAME', 'New-Hotel'),
        'recaptcha_site_key' => env('GOOGLE_RECAPTCHA_SITE_KEY'),
        'recaptcha_secret_key' => env('GOOGLE_RECAPTCHA_SECRET_KEY'),
        'convert_passwords' => env('CONVERT_PASSWORDS'),
        'force_https' => env('FORCE_HTTPS', false),
        'date_format' => env('DATE_FORMAT', 'Y-m-d - h:m:s'),
        'default_language' => env('APP_LOCALE', 'en'),
        'debug_mode_enabled' => env('APP_DEBUG', false),
        'site_environment' => env('APP_ENV'),
    ],

    'reactions' => [
        'bad', 'crying', 'good', 'happy', 'taut', 'impatient', 'inlove', 'laugh', 'proud', 'wow',
        'shameful', 'shameless', 'sleeping', 'smile', 'tongue', 'wink', 'disgusted', 'angry', 'lgbt', 'heart2', 'bobba', 'poop',
        'like', 'unlike', 'fire', 'eyes', 'crown', 'star', 'heart',
    ],

    'migrations' => [
        // Only set this to true in the .env file if your CERTAIN that you want to rename coliding table names
        'rename_tables' => env('RENAME_COLLIDING_TABLES', false),
    ],

    'rcon' => [
        'domain' => AF_INET,
        'type' => SOCK_STREAM,
        'protocol' => SOL_TCP,
    ],

    'client' => [
        'nitro_path' => env('NITRO_CLIENT_PATH', '/client/html5/nitro-client'), // Path where the index.html is
        'flash_enabled' => env('FLASH_CLIENT_ENABLED', false),
    ],

    'flash' => [
        'host' => env('EMULATOR_IP', '127.0.0.1'),
        'port' => env('EMULATOR_PORT', 3000),
        'swf_base_path' => env('SWF_BASE_PATH'),
        'production_folder' => env('PRODUCTION_FOLDER'),
        'habbo_swf' => env('HABBO_SWF', 'Habbo.swf'),
        'external_texts' => env('EXTERNAL_TEXTS'),
        'external_variables' => env('EXTERNAL_VARIABLES'),
        'external_furnidata' => env('EXTERNAL_FURNIDATA'),
        'external_productdata' => env('EXTERNAL_PRODUCTDATA'),
        'external_figuremap' => env('EXTERNAL_FIGUREMAP'),
        'external_figuredata' => env('EXTERNAL_FIGUREDATA'),
        'external_override_variables' => env('EXTERNAL_OVERRIDE_VARIABLES'),
        'external_override_texts' => env('EXTERNAL_OVERRIDE_TEXTS'),
    ],

    'findretros' => [
        'enabled' => env('FINDRETROS_ENABLED', false),
        'name' => env('FINDRETROS_NAME', 'Example'),
        'api' => 'https://findretros.com',
    ],

    'paypal' => [
        'mode'    => env('PAYPAL_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
        'sandbox' => [
            'client_id'         => env('PAYPAL_SANDBOX_CLIENT_ID', ''),
            'client_secret'     => env('PAYPAL_SANDBOX_CLIENT_SECRET', ''),
            'app_id'            => env('paypal_sandbox_app_id', 'APP-80W284485P519543T'),
        ],
        'live' => [
            'client_id'         => env('PAYPAL_LIVE_CLIENT_ID', ''),
            'client_secret'     => env('PAYPAL_LIVE_CLIENT_SECRET', ''),
            'app_id'            => env('PAYPAL_LIVE_APP_ID', ''),
        ],

        'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Order'), // Can only be 'Sale', 'Authorization' or 'Order'
        'currency'       => env('PAYPAL_CURRENCY', 'USD'),
        'notify_url'     => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
        'locale'         => env('PAYPAL_LOCALE', 'en_US'), // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
        'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
    ]
];
