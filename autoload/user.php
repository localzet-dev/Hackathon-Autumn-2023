<?php
use app\model\User;

/**
 * @package     Triangle Web
 * @link        https://github.com/Triangle-org/Web
 *
 * @author      Ivan Zorin <creator@localzet.com>
 * @copyright   2018-2023 Localzet Group
 * @license     https://mit-license.org MIT
 */


/**
 * Текущий пользователь
 * @param $fields
 * @return User|mixed|null
 * @throws Exception
 * @throws Exception
 */
function user($fields = null)
{
    refresh_user_session();

    $user = User::where(['user_id' => session('user_id')]);

    if ($fields === null) {
        return $user;
    }

    if (is_array($fields)) {
        $results = [];
        foreach ($fields as $field) {
            $results[$field] = $user->$field ?? null;
        }
        return $results;
    }
    if (strpos($fields, '.')) {
        $keyArray = explode('.', $fields);

        foreach ($keyArray as $field) {
            if (!isset($user->$field)) {
                return $user->$fields ?? null;
            }

            $user = $user->$field;
        }

        return $user;
    }

    return $user->$fields ?? null;
}

/**
 * Обновить сессию пользователя
 * @param bool $force
 * @return void
 * @throws Exception
 * @throws Exception
 * @throws Exception
 * @throws Exception
 * @throws Exception
 */
function refresh_user_session(bool $force = false)
{
    $user_id = session('user_id');

    if (!$user_id) {
        return;
    }

    $user = User::where(['user_id' => $user_id]);

    if (!$user) {
        session()->forget('user_id');
        return;
    }

    $timeNow = time();
    $sessionTTL = 2;
    $sessionLastUpdateTime = session('session_last_update_time', 0);

    if (!$force && $timeNow - $sessionLastUpdateTime < $sessionTTL) {
        return;
    }

    session([
        'session_last_update_time' => $timeNow,
        'user_id' => $user->user_id,
    ]);
}
