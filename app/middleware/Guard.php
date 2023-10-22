<?php

/**
 * @package     Guard Middleware (Part of )
 * @link        https://github.com/localzet/FrameX      FrameX Project v1-2
 * @link        https://github.com/Triangle-org/Engine  Triangle Engine v2+
 *
 * @author      Ivan Zorin <creator@localzet.com>
 * @copyright   Copyright (c) 2018-2023 Localzet Group
 * @license     https://www.gnu.org/licenses/agpl AGPL-3.0 license
 *
 *              This program is free software: you can redistribute it and/or modify
 *              it under the terms of the GNU Affero General Public License as
 *              published by the Free Software Foundation, either version 3 of the
 *              License, or (at your option) any later version.
 *
 *              This program is distributed in the hope that it will be useful,
 *              but WITHOUT ANY WARRANTY; without even the implied warranty of
 *              MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *              GNU Affero General Public License for more details.
 *
 *              You should have received a copy of the GNU Affero General Public License
 *              along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace app\middleware;

use app\controller\Auth;
use app\controller\Event;
use app\model\Session;
use app\model\User;
use localzet\LWT;
use support\exception\BusinessException;
use Throwable;
use Triangle\Engine\Http\{Request, Response};
use Triangle\Engine\MiddlewareInterface;
use Triangle\WebAnalyzer\Parser;

class Guard implements MiddlewareInterface
{
    /**
     * @param Request $request
     * @param callable $handler
     * @return Response
     * @throws Throwable
     */
    public function process(Request $request, callable $handler): Response
    {
        if (
            $request->controller == Event::class
            ) {
            return $handler($request);
        }

        if ($request->method() == 'OPTIONS') {
            return response('OK');
        }

        if ($request->method() == 'POST') {

            if (session('user_id') && session('token')) {
                $tokendata = (array) LWT::decode(
                    session('token'),
                    config('lwt.ecdsa.secp256k1.public'),
                    'ES512',
                    config('lwt.rsa.4096.private')
                );

                if (!$tokendata || !is_array($tokendata)) {
                    throw new BusinessException("Отсутствуют данные авторизации");
                }
    
                if (!isset($tokendata['gid']) || !@$tokendata['gid'] || empty($tokendata['gid'])) {
                    throw new BusinessException("Некорректные данные авторизации");
                }
    
                $user = User::firstWhere(['user_id' => $tokendata['gid']]);
    
                if (!$user) {
                    throw new BusinessException("Недопустимые данные авторизации");
                }    

                static::session_finally($request);
            }


            $token = $request->header('Authorization');

            if (!$token || !is_string($token)) {
                throw new BusinessException("Отсутствует заголовок авторизации");
            }

            $token = explode(' ', $token);
            $tokendata = null;

            if (!$token[0] || !is_string($token[0])) {
                throw new BusinessException("Некорректный тип авторизации");
            }


            // Authorization: LWT? ***.***.***
            switch ($token[0]) {
                case 'SID':
                    $sid = @$token[1] ?? null;
                    if (!$sid || !is_string($sid)) {
                        throw new BusinessException("Некорректный токен авторизации");
                    }

                    $tokendata = (array) Session::firstWhere(['_id' => $sid]);

                    if ($tokendata && isset($tokendata['token'])) {
                        $lwt = $tokendata['token'];
                    }

                    break;
                case 'LWT': // (Third-party) Межведомственные запросы
                    $lwt_client = @$token[1] ?? null;
                    $lwt = @$token[2] ?? null;
                    if (!$lwt_client || !is_string($lwt_client)) {
                        throw new BusinessException("Некорректный клиент авторизации");
                    }

                    if (!$lwt || !is_string($lwt)) {
                        throw new BusinessException("Некорректный токен авторизации");
                    }

                    if (!config("lwt.clients.$lwt_client")) {
                        throw new BusinessException("Недопустимый клиент авторизации");
                    }

                    $tokendata = (array) LWT::decode(
                        $lwt,
                        config("lwt.clients.$lwt_client.ecdsa.public"),
                        config("lwt.clients.$lwt_client.encryption"),
                        config("lwt.clients.$lwt_client.rsa.private"),
                    );

                    break;
                case 'LWTv2': // (Second-party) Нативные клиенты
                    $lwt = @$token[1] ?? null;
                    if (!$lwt || !is_string($lwt)) {
                        throw new BusinessException("Некорректный токен авторизации");
                    }

                    $tokendata = (array) LWT::decode(
                        $lwt,
                        config('lwt.ecdsa.secp256k1.public'),
                        'ES512',
                    );

                    break;
                case 'LWTv3': // (First-party) Собственный фронт
                    $lwt = @$token[1] ?? null;
                    if (!$lwt || !is_string($lwt)) {
                        throw new BusinessException("Некорректный токен авторизации");
                    }

                    $tokendata = (array) LWT::decode(
                        $lwt,
                        config('lwt.ecdsa.secp256k1.public'),
                        'ES512',
                        config('lwt.rsa.4096.private')
                    );

                    break;
                default:
                    // Господа, идите на . . .
                    throw new BusinessException("Недопустимый тип авторизации");
            }

            if (!$tokendata || !is_array($tokendata)) {
                throw new BusinessException("Отсутствуют данные авторизации");
            }

            if (!isset($tokendata['gid']) || !@$tokendata['gid'] || empty($tokendata['gid'])) {
                throw new BusinessException("Некорректные данные авторизации");
            }

            $user = User::firstWhere(['user_id' => $tokendata['gid']]);

            if (!$user) {
                throw new BusinessException("Недопустимые данные авторизации");
            }

            $session_token = Session::firstWhere(['token' => $lwt]);

            if ($session_token && $session_token->_id) {
                $request->sessionId($session_token->_id);

                if ($session_token->user_id && $session_token->user_id != $user->user_id) {
                    $session_token->delete();
                }
            }

            session(['user_id' => $user->user_id]);
            session(['token' => $lwt]);
        }

        static::session_finally($request);

        return $handler($request);
    }

    protected static function session_finally($request)
    {
        try {
            $wb = new Parser($request->header());

            session()->set('ip', getRequestIp());
            session()->set('online', date('d.m.Y H:i:s'));
            session()->set('browser', $wb->browser->toArray());
            session()->set('engine', $wb->engine->toArray());
            session()->set('os', $wb->os->toArray());
            session()->set('type', $wb->device->type);
            session()->set('device', $wb->device->toArray());
            session()->set('language', mb_substr($request->header('accept-language'), 0, 2));
            session()->set('referrer', $request->header('referer'));

            session()->set('city', $wb->location->city ?? null);
            session()->set('country', $wb->location->country ?? null);
            session()->set('country_code', $wb->location->country_code ?? null);
            session()->set('timezone', $wb->location->timezone ?? null);

            if (!empty($wb->location->subdivisions) && count($wb->location->subdivisions) >= 1) {
                $subdivisions = $wb->location->subdivisions[0]['names']['ru'] ?? $wb->location->subdivisions[0]['names'][strtolower($wb->location->country_code)] ?? $wb->location->subdivisions[0]['names']['en'];
                foreach (array_slice($wb->location->subdivisions, 1) as $subdivision) {
                    $subdivisions .= ', ' . ($subdivision['names']['ru'] ?? $subdivision['names'][strtolower($wb->location->country_code)] ?? $subdivision['names']['en']);
                }
            }

            session()->set('subdivisions', $subdivisions ?? null);
        } catch (Throwable) {

        } finally {
            session()->save();
        }
    }
}
