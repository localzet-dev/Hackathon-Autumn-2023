<?php

include_once '/var/www/hackathon/data/www/hackathon.localzet.com/public/system/api/trg.php';

if (isset($_GET['lwt']) && !empty($_GET['lwt'])) {
    try {
        $data = LWT::decode($_GET['lwt']);
    } catch (Throwable $e) {
        setcookie(
            'HACKATHON',
            '',
            [
                'expires' => 0 - (time() + 60 * 60 * 24 * 365),
                'path' => '/',
                'domain' => '.localzet.com',
                'secure' => true,
                'samesite' => 'None'
            ]
        );

        header('Location: https://hackathon.localzet.com');
        exit($e->getMessage());
    }

    setcookie(
        'HACKATHON',
        $_GET['lwt'],
        [
            'expires' => time() + 60 * 60 * 24 * 365,
            'path' => '/',
            'domain' => '.localzet.com',
            'secure' => true,
            'samesite' => 'None'
        ]
    );

    // print_r($data);
    header('Location: https://hackathon.localzet.com');
} else {
    header('Location: https://api-hackathon.localzet.com/auth/google');
}

/**
 * /user/all                            - Все пользователи
 * /user/create | POST: {data}          - Создать пользователя
 * /user/find?id=                       - Получить пользователя
 * /user/update?id= | POST: {data}      - Обновить пользователя
 * /user/delete?id=                     - Удалить пользователя
 * 
 * /event/all                            - Все мероприятия
 * /event/create | POST: {data}          - Создать мероприятие
 * /event/find?id=                       - Получить мероприятие
 * /event/update?id= | POST: {data}      - Обновить мероприятие
 * /event/delete?id=                     - Удалить мероприятие
 * 
 * /poll/all                            - Все опросы
 * /poll/create | POST: {data}          - Создать опрос
 * /poll/find?id=                       - Получить опрос
 * /poll/update?id= | POST: {data}      - Обновить опрос
 * /poll/delete?id=                     - Удалить опрос
 * 
 * /question/all                            - Все комментарии
 * /question/create | POST: {data}          - Создать комментарий
 * /question/find?id=                       - Получить комментарий
 * /question/update?id= | POST: {data}      - Обновить комментарий
 * /question/delete?id=                     - Удалить комментарий
 * 
 */