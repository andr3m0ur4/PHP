<?php

    //$hash = password_hash('123', PASSWORD_BCRYPT);
    /* $hash = '$2y$10$XG8VmjInd9FnkmT.BZtOyeIRNlF/i7gwvPeMx1I/85hHZOPcAr4HK';
    $senha = '123';

    if (password_verify($senha, $hash)) {
        echo 'ACERTOU!';
    } else {
        echo 'ERROU!';
    } */

    $email = 'teste@teste.com';
    $senha = '123';

    $sql = 'SELECT * FROM usuarios WHERE email = :email';
    $sql = $pdo->prepare($sql);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $usuario = $sql->fetch(PDO::FETCH_OBJ);

        if (password_verify($senha, $usuario->senha)) {
            echo 'ACERTOU LOGIN!';
        } else {
            echo 'ERROU LOGIN!';
        }
    }
