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

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
      'client_id' => '396202891789209',
      'client_secret' => 'a76d3af119ce327d78845573e79e28f6',
      'redirect' => 'https://library.getdemo.xyz/login/facebook/callback',
    ],


    'google' => [
      'client_id' => 'GOOGLE_CLIENT_ID',
      'client_secret' => 'GOOGLE_SECRET_KEY',
      'redirect' => 'http://localhost:8000/login/google/callback',
    ],

];
