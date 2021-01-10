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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '2770034483318641', 
        'client_secret' => '6210089012d91821d7cc1aa77ec73597', 
        'redirect' => 'http://localhost:8000/admin/callback' 
    ],
    'google' => [
        'client_id' => '287736948616-b7sthdg6a3j6pj6amfhri1d5jng6m38f.apps.googleusercontent.com',
        'client_secret' => 'Dk885O-mph0OfDn4QHjKYxp9',
        'redirect' => 'http://localhost:8000/admin/google/calback'
    ],



];
