<?php

return [
    'clients' => [
        'exesfull' => [
            'encryption' => 'ES512',
            'ecdsa' => [
                'private' => file_get_contents(base_path('resources/security/ec-dsa-secp256k1-private.pem')),
                'public' => file_get_contents(base_path('resources/security/ec-dsa-secp256k1-public.pem')),
            ],
            'rsa' => [
                'private' => file_get_contents(base_path('resources/security/rsa-4096-private.pem')),
                'public' => file_get_contents(base_path('resources/security/rsa-4096-public.pem')),
            ],
        ]
    ],

    // Elliptic-curve Digital Signature Algorithm
    // Алгоритм цифровой подписи на эллиптических кривых
    'ecdsa' => [
        'b-283' => [
            'private' => file_get_contents(base_path('resources/security/ec-dsa-b-283-private.pem')),
            'public' => file_get_contents(base_path('resources/security/ec-dsa-b-283-public.pem')),
        ],
        'b-409' => [
            'private' => file_get_contents(base_path('resources/security/ec-dsa-b-409-private.pem')),
            'public' => file_get_contents(base_path('resources/security/ec-dsa-b-409-public.pem')),
        ],
        'b-571' => [
            'private' => file_get_contents(base_path('resources/security/ec-dsa-b-571-private.pem')),
            'public' => file_get_contents(base_path('resources/security/ec-dsa-b-571-public.pem')),
        ],

        'p-256' => [
            'private' => file_get_contents(base_path('resources/security/ec-dsa-p-256-private.pem')),
            'public' => file_get_contents(base_path('resources/security/ec-dsa-p-256-public.pem')),
        ],
        'p-384' => [
            'private' => file_get_contents(base_path('resources/security/ec-dsa-p-384-private.pem')),
            'public' => file_get_contents(base_path('resources/security/ec-dsa-p-384-public.pem')),
        ],
        'p-521' => [
            'private' => file_get_contents(base_path('resources/security/ec-dsa-p-521-private.pem')),
            'public' => file_get_contents(base_path('resources/security/ec-dsa-p-521-public.pem')),
        ],

        'secp256k1' => [
            'private' => file_get_contents(base_path('resources/security/ec-dsa-secp256k1-private.pem')),
            'public' => file_get_contents(base_path('resources/security/ec-dsa-secp256k1-public.pem')),
        ],
    ],

    // Edwards-curve Digital Signature Algorithm
    // Алгоритм цифровой подписи на скрученных кривых (кривых Эдвардса)
    'eddsa' => [
        '25519' => [
            'private' => file_get_contents(base_path('resources/security/ed-dsa-25519-private.pem')),
            'public' => file_get_contents(base_path('resources/security/ed-dsa-25519-public.pem')),
        ],
    ],

    // Rivest–Shamir–Adleman
    // Криптосистема (набор криптоалгоритмов)
    'rsa' => [
        '256' => [
            'private' => file_get_contents(base_path('resources/security/rsa-256-private.pem')),
            'public' => file_get_contents(base_path('resources/security/rsa-256-public.pem')),
        ],
        '1024' => [
            'private' => file_get_contents(base_path('resources/security/rsa-1024-private.pem')),
            'public' => file_get_contents(base_path('resources/security/rsa-1024-public.pem')),
        ],
        '2048' => [
            'private' => file_get_contents(base_path('resources/security/rsa-2048-private.pem')),
            'public' => file_get_contents(base_path('resources/security/rsa-2048-public.pem')),
        ],
        '3072' => [
            'private' => file_get_contents(base_path('resources/security/rsa-3072-private.pem')),
            'public' => file_get_contents(base_path('resources/security/rsa-3072-public.pem')),
        ],
        '4096' => [
            'private' => file_get_contents(base_path('resources/security/rsa-4096-private.pem')),
            'public' => file_get_contents(base_path('resources/security/rsa-4096-public.pem')),
        ],
    ],
];