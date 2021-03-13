<?php

    require_once './config.php';

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = addslashes($_POST['email']);
        $senha = md5(addslashes($_POST['senha']));

        $sql = 'SELECT * FROM usuarios WHERE email = :email AND senha = :senha';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_OBJ);

            $_SESSION['id'] = $usuario->id;

            header('Location: index.php');
        }
    }

    require_once './template-login.php';
