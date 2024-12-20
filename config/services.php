<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'iiko' => [
        'base_url' => env('IIKO_BASE_URL', 'https://api-ru.iiko.services'),
        'timeout_seconds' => env('IIKO_TIMEOUT_SECONDS', 20),
        'log_channel' => 'iiko_connector',
    ],

    'welcome_group' => [
        'base_url' => env('WELCOME_GROUP_BASE_URL'),
        'timeout_seconds' => env('WELCOME_GROUP_TIMEOUT_SECONDS', 20),
        'username' => env('WELCOME_GROUP_USERNAME'),
        'password' => env('WELCOME_GROUP_PASSWORD'),
        'log_channel' => 'welcome_group_connector',
    ],
];
