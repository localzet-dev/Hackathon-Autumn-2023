<?php declare(strict_types=1);

define('BASE_PATH', '/var/www/hackathon/data/www/hackathon.localzet.com');

function run_path(string $path = ''): string
{
    static $runPath = '';
    if (!$runPath) {
        $runPath = is_phar() ? dirname(Phar::running(false)) : BASE_PATH;
    }
    return path_combine($runPath, $path);
}

function base_path(false|string $path = ''): string
{
    if (false === $path) {
        return run_path();
    }
    return path_combine(BASE_PATH, $path);
}

function app_path(string $path = ''): string
{
    return path_combine(BASE_PATH . DIRECTORY_SEPARATOR . 'app', $path);
}

function view_path(string $path = ''): string
{
    return path_combine(BASE_PATH . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'view', $path);
}

function public_path(string $path = ''): string
{
    static $publicPath = '';
    if (!$publicPath) {
        $publicPath = config('app.public_path') ?: run_path('public');
    }
    return path_combine($publicPath, $path);
}

function config_path(string $path = ''): string
{
    return path_combine(BASE_PATH . DIRECTORY_SEPARATOR . 'config', $path);
}

function runtime_path(string $path = ''): string
{
    static $runtimePath = '';
    if (!$runtimePath) {
        $runtimePath = config('app.runtime_path') ?: run_path('runtime');
    }
    return path_combine($runtimePath, $path);
}

function path_combine(string $front, string $back): string
{
    return $front . ($back ? (DIRECTORY_SEPARATOR . ltrim($back, DIRECTORY_SEPARATOR)) : $back);
}