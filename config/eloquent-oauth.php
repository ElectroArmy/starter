<?php

use App\User;

return [
    'table' => 'oauth_identities',
    'providers' => [
        'facebook' => [
            'client_id' => '1467878203533146',
            'client_secret' => '44f0726a0d15abce7009fc8f5af023c0',
            'redirect_uri' => 'http://games.ormrepo.co.uk/facebook/login',
            'scope' => ['email', 'public_profile'],
        ],
        'google' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/google/redirect',
            'scope' => [],
        ],
        'github' => [
            'client_id' => 'a794f690b17e388212f9',
            'client_secret' => 'bd8ff991428cd09a2824107155942997debe68ea',
            'redirect_uri' => 'http://games.ormrepo.co.uk/github/login',
            'scope' => [],
        ],

        'linkedin' => [
            'client_id' => '75j5f0nb9mkcih',
            'client_secret' => 'beWuAmdGczJPoIrh',
            'redirect_uri' => 'http://games.ormrepo.co.uk/linkedin/login',
            'scope' => [],
        ],
        'instagram' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/instagram/redirect',
            'scope' => [],
        ],
        'soundcloud' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/soundcloud/redirect',
            'scope' => [],
        ],
    ],
];

