<?php

    require 'config.php';

    if (!empty($_POST['email'])) {

        $email = $_POST['email'];

        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {

            $sql = $sql->fetch(PDO::FETCH_OBJ);
            $id = $sql->id;

            $token = md5(time() . rand(0, 99999) . rand(0, 99999));

            $sql = "INSERT INTO usuarios_token (id_usuario, hash, expired_in) 
                VALUES (:id_usuario, :hash, :expired_in)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(':id_usuario', $id);
            $sql->bindValue(':hash', $token);
            $sql->bindValue(':expired_in', date('Y-m-d', strtotime('+2 day')));
            $sql->execute();

            $link = "https://andremouradev.com.br/esquecisenha/redefinir.php?token={$token}";

            $mensagem = "Clique no link para redefinir sua senha:\n\n{$link}";

            $assunto = 'Redefinição de senha';
            $headers = 'From: andre.benedicto@etec.sp.gov.br' . "\r\n" .
                'X-Mailer: PHP/' . phpversion() . "\r\n" .
                'Content-type: text/html; charset=UTF-8';
            
            mail($email, $assunto, $mensagem, $headers);

            echo 'Acesse seu email para redefinir sua senha.';
            exit;

        }

    }

    require 'template-esqueci.php';
