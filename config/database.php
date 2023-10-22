<?php

/**
 * @package     Triangle Web
 * @link        https://github.com/Triangle-org
 *
 * @copyright   2018-2023 Localzet Group
 * @license     https://mit-license.org MIT
 */

return [
    'default' => 'mysql',
    'connections' => [
        'mysql' => [
            'driver'        => 'mysql',
            'host'          => 'localhost',
            'port'          => 3306,
            'database'      => 'hackathon',
            'unix_socket'   => '',
            'charset'       => 'utf8',
            'collation'     => 'utf8_unicode_ci',
            'prefix'        => '',
            'strict'        => true,
            'engine'        => null,
        ],
    ],
];
