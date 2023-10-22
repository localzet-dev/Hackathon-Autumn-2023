<?php

return [
    'providers' => [
        'Google' => [
            'enabled' => true,
            'keys' => [
            ],
            // 'scope' => 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/user.phonenumbers.read https://www.googleapis.com/auth/user.gender.read https://www.googleapis.com/auth/user.emails.read https://www.googleapis.com/auth/user.birthday.read https://www.googleapis.com/auth/user.organization.read ',

            //   'authorize_url_parameters' => [
            //              'approval_prompt' => 'force', // to pass only when you need to acquire a new refresh token.
            //              'access_type' => ..,      // is set to 'offline' by default
            //              'hd' => ..,
            //              'state' => ..,
            //              // etc.
            //       ]
        ],
    ]
];