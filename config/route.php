<?php

/**
 * @package     Triangle Web
 * @link        https://github.com/Triangle-org
 *
 * @copyright   2018-2023 Localzet Group
 * @license     https://mit-license.org MIT
 */

use app\model\Event;
use app\model\EventInfo;
use app\model\User;
use localzet\LWT;
use localzet\Server;
use support\Request;
use support\Response;
use Triangle\Engine\App;
use Triangle\Engine\Route;
use Triangle\OAuth;
use localzet\Server\Protocols\Http\Response as LocalzetResponse;

Route::any('/auth', function (Request $request) {
    $user = User::firstWhere(['user_id' => session('user_id')]);

    return $user ? $user['firstname'] : "Тебя нету";
});

Route::any('/auth/{provider}', function (Request $request, $provider) {
    $host = "https://" . request()->host(true);

    $config = config('oauth');
    $config['callback'] = "$host/auth/$provider";

    $manager = new OAuth($config);

    $adapter = $manager->getAdapter($provider);

    $response = $adapter->authenticate();

    if ($response && $response instanceof LocalzetResponse) {
        session(['redirect' => $request->input('redirect')]);
        return $response;
    }

    $tokens = $adapter->getAccessToken();
    $profile = $adapter->getUserProfile();

    // $adapter->disconnect();

    $user = User::updateOrCreate(['user_id' => $profile->identifier], [
        'firstname' => $profile->firstName,
        'lastname' => $profile->lastName,
        'img_url' => $profile->photoURL ?? ('https://ui-avatars.com/api/?name=' . $profile->firstName . '+' . $profile->lastName),
        'email' => $profile->email,
        // 'tokens' => $tokens,
    ]);

    $lwt = LWT::encode(
        ['_id' => $user->_id, 'gid' => $user->user_id],
        config('lwt.ecdsa.secp256k1.private'),
        'ES512',
        config('lwt.rsa.4096.public')
    );

    session(['user_id' => $user->user_id]);
    session(['token' => $lwt]);

    $redirect = session('redirect');
    session()->delete('redirect');

    if ($redirect) {
        return redirect($redirect)->cookie('HACKATHON', $lwt, time() + 60 * 60 * 24 * 365, '/', '.localzet.com', false, false, 'None');
    } else {
        return redirect("https://hackathon.localzet.com/auth.php?lwt=$lwt")->cookie('HACKATHON', $lwt, time() + 60 * 60 * 24 * 365, '/', '.localzet.com', false, false, 'None');
    }

    // return responseJson($user->toArray());
});

Route::any('/', function (Request $request) {
    return view('landing');
});

Route::any('/user', function (Request $request) {
    return view('user', ['user' => User::firstWhere(['user_id' => session('user_id')])]);
});

Route::any('/user/{user_id}', function (Request $request, $user_id) {
    return view('user', ['user' => User::firstWhere(['user_id' => $user_id])]);
});

Route::any('/edit/{edit_id}', function (Request $request, $edit_id) {
    return view('event_edit', [
        'event' => EventInfo::firstWhere(['edit_id' => $edit_id]),
        'user' => User::firstWhere(['user_id' => session('user_id')]),
    ]);
});

// Route::fallback(function() {
//     return new Response(200, [], App::execPhpFile(public_path('index.php')));
// });