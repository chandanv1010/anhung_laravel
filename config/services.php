<?php

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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    
    'paypal' => [
        'client_id'         => env('PAYPAL_CLIENT_ID'),
        'client_secret'     => env('PAYPAL_SECRET'),
        'mode' => env('PAYPAL_MODE')
    ],

    'google' => [
        'client_id' => config('apps.general.google_client_id'),
        'client_secret' => config('apps.general.google_secret_id'),
        'redirect' =>  env('url').'/buyer/google/callback'
    ],

    'facebook' => [
        'client_id' => config('apps.general.facebook_client_id'),
        'client_secret' => config('apps.general.facebook_secret_id'),
        'redirect' =>   env('url').'/buyer/facebook/callback'
    ],


];
