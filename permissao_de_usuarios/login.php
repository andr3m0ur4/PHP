<?php

    session_start();
    require 'config.php';
    require 'classes/Usuarios.php';

    if (!empty($_POST['email'])) {
        $email = addslashes($_POST['email']);
        $senha = md5($_POST['senha']);

        $usuarios = new Usuarios($pdo);

        if ($usuarios->fazerLogin($email, $senha)) {
            header('Location: index.php');
            exit;
        } else {
            echo 'Usuários e/ou senha errados!';
        }
    }

    require 'template-login.php';
