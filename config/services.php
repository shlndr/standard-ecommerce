<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'exchange-api' => [
        'default' => 'exchange_rates',

        'fixer' => [
            'key' => env('fixer_api_key'),
            'class' => 'Webkul\Core\Helpers\Exchange\FixerExchange'
        ],

        'exchange_rates' => [
            'class' => 'Webkul\Core\Helpers\Exchange\ExchangeRates'
        ],
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '2133677133441374',
        'client_secret' => '5e2d95866e01b9acddd0a8c53f5276e7',
        'redirect' => 'https://demo.onlinereviews.org.uk/customer/social-login/facebook/callback',
    ],

    'twitter' => [
        'client_id' => env('TWITTER_CLIENT_ID'),
        'client_secret' => env('TWITTER_CLIENT_SECRET'),
        'redirect' => env('TWITTER_CALLBACK_URL'),
    ],

    'google' => [
        'client_id' => '845545964564-n20vrvorj0ng5cqgeuae28hlj2g0o68k.apps.googleusercontent.com',
        'client_secret' => 'xiuHbF5iaWk3bkvCiHytMxun',
        'redirect' => 'https://demo.onlinereviews.org.uk/customer/social-login/google/callback',
    ],

    'linkedin' => [
        'client_id' => env('LINKEDIN_CLIENT_ID'),
        'client_secret' => env('LINKEDIN_CLIENT_SECRET'),
        'redirect' => env('LINKEDIN_CALLBACK_URL'),
    ],

    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => env('GITHUB_CALLBACK_URL'),
    ],
];
