<?php

    require 'config.php';

    if (!empty($_GET['token'])) {
        $token = $_GET['token'];

        $sql = "SELECT * FROM usuarios_token WHERE hash = :hash AND used = 0 AND expired_in > NOW()";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':hash', $token);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch(PDO::FETCH_OBJ);
            $id = $sql->id_usuario;

            if (!empty($_POST['senha'])) {
                $senha = md5($_POST['senha']);

                $sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";
                $sql = $pdo->prepare($sql);
                $sql->bindValue(':senha', $senha);
                $sql->bindValue(':id', $id);
                $sql->execute();

                $sql = "UPDATE usuarios_token SET used = 1 WHERE hash = :hash";
                $sql = $pdo->prepare($sql);
                $sql->bindValue(':hash', $token);
                $sql->execute();

                echo 'Senha alterada com sucesso!';
                exit;
            }

            require 'template-redefinir.php';

        } else {
            echo 'Token inválido ou usado!';
            exit;
        }
    }
