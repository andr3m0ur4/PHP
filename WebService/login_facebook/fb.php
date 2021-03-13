<?php

    session_start();

    require_once __DIR__ . '/vendor/autoload.php';

    use Facebook\Facebook;

    $app_id = '1175475329516255';
    $app_secret = 'c17e4dc7e77aa84167e262eba4d9813a';

    $fb = new Facebook([
        'app_id' => $app_id,
        'app_secret' => $app_secret,
    ]);

    // Erro linha 108
    // preg_match('/HTTP\/\d(?:\.\d)?\s+(\d+)\s+/',$rawResponseHeader, $match);
    