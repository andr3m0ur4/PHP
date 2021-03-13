<?php

    session_start();
    
    if (empty($_SESSION['proprietario'])) {
        $_SESSION['proprietario'] = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
    }

    $token = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

    if ($_SESSION['proprietario'] != $token) {
        exit;
    }

    echo 'MEU SISTEMA ...<pre>';
    print_r($_SESSION);
