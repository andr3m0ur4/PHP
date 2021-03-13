<?php

    try {
        $pdo = new PDO('mysql:dbname=blog;host=10.0.0.102', 'andre-moura', 'andre');
    } catch (PDOException $e) {
        die($e->getMessage());
    }

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);

        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            echo 'Usuário logado com sucesso!';
        } else {
            echo 'E-mail e/ou senha estão errados!';
        }
    } else {
        echo 'Digite um e-mail e/ou senha!';
    }
    