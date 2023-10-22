<?php

/**
 * @package     Triangle Web
 * @link        https://github.com/Triangle-org
 *
 * @copyright   2018-2023 Localzet Group
 * @license     https://mit-license.org MIT
 */

use Triangle\Engine\Session\FileSessionHandler;
use Triangle\Engine\Session\RedisSessionHandler;
use Triangle\Engine\Session\RedisClusterSessionHandler;
use localzet\Server\Protocols\Http\Session\MongoSessionHandler;

return [

    'type' => 'file', // or redis or redis_cluster
    'handler' => FileSessionHandler::class,
    'config' => [
        'file' => [
            'save_path' => runtime_path() . '/sessions',
        ],
        'redis' => [
            'host' => '127.0.0.1',
            'port' => 6379,
            'auth' => '',
            'timeout' => 2,
            'database' => '',
            'prefix' => 'redis_session_',
        ],
        'redis_cluster' => [
            'host' => ['127.0.0.1:7000', '127.0.0.1:7001', '127.0.0.1:7001'],
            'timeout' => 2,
            'auth' => '',
            'prefix' => 'redis_session_',
        ]
    ],
    'session_name' => 'HACKSID',
    'auto_update_timestamp' => false,
    'lifetime' => 7 * 24 * 60 * 60,
    'cookie_lifetime' => 365 * 24 * 60 * 60,
    'cookie_path' => '/',
    'domain' => '.localzet.com',
    'http_only' => true,
    'secure' => true,
    'same_site' => 'None',
    'gc_probability' => [1, 1000],
];
