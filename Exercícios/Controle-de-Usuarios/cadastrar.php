<?php

    require_once './config.php';

    if (!empty($_GET['codigo'])) {
        $codigo = addslashes($_GET['codigo']);

        $sql = 'SELECT * FROM usuarios WHERE codigo = :codigo';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':codigo', $codigo);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            header('Location: login.php');
            exit;
        }
    } else {
        header('Location: login.php');
        exit;
    }

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = addslashes($_POST['email']);
        $senha = md5(addslashes($_POST['senha']));

        $sql = 'SELECT email FROM usuarios WHERE email = :email';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            $codigo = md5(rand(0, 99999) . rand(0, 99999));
            $sql = 'INSERT INTO usuarios (email, senha, codigo) VALUES (:email, :senha, :codigo)';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':senha', $senha);
            $stmt->bindValue(':codigo', $codigo);
            $stmt->execute();

            unset($_SESSION['id']);

            header('Location: index.php');
            exit;
        }
    }

    require_once './template-cadastrar.php';
