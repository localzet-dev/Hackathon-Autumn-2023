<?php

/**
 * @package     Triangle Web
 * @link        https://github.com/Triangle-org
 *
 * @copyright   2018-2023 Localzet Group
 * @license     https://mit-license.org MIT
 */

use support\Request;

return [
    'debug' => true,
    'error_reporting' => E_ALL,
    'default_timezone' => 'Europe/Moscow',
    'request_class' => Request::class,
    'public_path' => base_path() . DIRECTORY_SEPARATOR . 'public',
    'runtime_path' => base_path(false) . DIRECTORY_SEPARATOR . 'runtime',
    'controller_suffix' => '',
    'controller_reuse' => true,
    'support_php_files' => true,

    'domain' => 'hachathon.localzet.com',
    'assets' => '/',

     'name' => 'Hackathon Autumn 2023',
    // 'description' => 'Описание',
    // 'keywords' => 'Ключевые слова',

    // 'logo' => 'URL логотипа',

    'owner' => 'NONA Team <nona@localzet.com>',
    'designer' => 'Maksim Everdeen (mr_everdeen) <frisese.com@gmail.com>',
    'author' => 'Ivan Zorin (localzet) <creator@localzet.com>',
    'copyright' => 'Localzet Group',
    'reply_to' => 'nona@localzet.com',

    'headers' => [
        'Content-Language' => 'ru',
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Credentials' => 'true',
        'Access-Control-Allow-Methods' => '*',
        'Access-Control-Allow-Headers' => '*',
    ],
];
