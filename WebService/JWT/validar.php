<?php

    require 'jwt.php';

    $jwt = new JWT();

    if (!empty($_GET['jwt'])) {
        $token = $_GET['jwt'];

        $data = $jwt->validate($token);

        if ($data) {
            print_r($data);
        } else {
            echo 'Token inválido!';
        }
    } else {
        echo 'Token não enviado!';
    }
