<?php declare(strict_types=1);

function auth(): bool
{
    if (!isset($_COOKIE['HACKATHON']) || empty($_COOKIE['HACKATHON'])) {
        return false;
    }

    try {
        $data = LWT::decode($_COOKIE['HACKATHON']);
    } catch (Throwable $e) {
        return false;
    }

    if (isset($data['sid']) && (!isset($_COOKIE['HACKSID']) || $data['sid'] !== $_COOKIE['HACKSID'])) {
        return false;
    }

    if (!$data || (!is_object($data) && !is_array($data))) {
        return false;
    }

    return true;
}


function user_id() {
    if (!auth()) return false;

    try {
        $data = LWT::decode($_COOKIE['HACKATHON']);

        if (isset($data['gid']) && !empty($data['gid'])) {
            return $data['gid'];
        } else {
            return false;
        }
    } catch (Throwable $e) {
        return false;
    }
}