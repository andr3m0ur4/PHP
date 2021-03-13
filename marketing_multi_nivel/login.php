<?php

    session_start();
    require 'config.php';
    $erro = false;

    if (!empty($_POST['email'])) {
        $email = addslashes($_POST['email']);
        $senha = md5(addslashes($_POST['senha']));

        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch(PDO::FETCH_OBJ);

            $_SESSION['login'] = $sql->id;

            header('Location: index.php');
            exit;
        } else {
            $erro = true;
        }
    }

    require 'template-login.php';
