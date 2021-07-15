<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    |
    | Specify icons and settings you would like you use.
    | By default we use FontAwesome 5 + squared icons but you could just as
    | easily replace it to FontAwesome 4 or another variant of the icon
    |
    */
    'services' => [
        'facebook' => [
            'base_url' => 'https://www.facebook.com/sharer/sharer.php?u=',
            'icon' => 'fab fa-lg fa-facebook-square',
        ],
        'twitter' => [
            'base_url' => 'https://twitter.com/intent/tweet?',
            'icon' => 'fab fa-lg fa-twitter-square',
        ],
        'linkedin' => [
            'base_url' => 'https://www.linkedin.com/sharing/share-offsite/?',
            'icon' => 'fab fa-lg fa-linkedin',
            'extra' => ['mini' => 'true'],
        ],
        'whatsapp' => [
            'base_url' => 'https://wa.me/?text=',
            'icon' => 'fab fa-lg fa-whatsapp-square',
        ],
        'pinterest' => [
            'base_url' => 'https://pinterest.com/pin/create/button/?url=',
            'icon' => 'fab fa-lg fa-pinterest-square',
        ],
        'reddit' => [
            'base_url' => 'https://www.reddit.com/submit?',
            'icon' => 'fab fa-lg fa-reddit-square',
        ],
        'telegram' => [
            'base_url' => 'https://telegram.me/share/url?',
            'icon' => 'fab fa-lg fa-telegram-plane',
        ],
        'mail' => [
            'icon' => 'far fa-lg fa-envelope-open-text',
        ],
        'clipboard' => [
            'icon' => 'far fa-lg fa-copy'
        ]
    ],
];
