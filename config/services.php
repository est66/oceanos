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
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'oAuth' => [
        'loginUrl' => 'https://accounts.google.com/o/oauth2/v2/auth?response_type=code&scope=email&redirect_uri=http://127.0.0.1/it44/auth/oauthGoogle&client_id=582318977910-sqgsukmvpsnrga043to5dngt815kqe2g.apps.googleusercontent.com',
        'clientId' => '582318977910-sqgsukmvpsnrga043to5dngt815kqe2g.apps.googleusercontent.com',
        'secretId' => 'k-GOpnAwmikFZqhn20WEBU-8',
    ],

];
