<?php

    if (isset($_POST['nome']) && !empty($_POST['nome'])) {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);

        require 'config.php';

        $sql = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email)";
        $sql = $pdo->prepare($sql);
        $sql->execute([
            ':nome' => $nome,
            ':email' => $email
        ]);
        $id = $pdo->lastInsertId();

        $md5 = md5($id);
        $link = 'https://www.andremouradev.com.br/cadastroconfirma/confirmar.php?h=' . $md5;

        $assunto = 'Confirme seu cadastro';
        $msg = "Clique no link abaixo para confirmar seu cadastro:\n\n{$link}";
        $headers = "FROM: andre.benedicto@etec.sp.gov.br" . "\r\n" .
            "X-Mailer: PHP/" . phpversion() . "\r\n" .
            "Content-type: text/html; charset=UTF-8";

        mail($email, $assunto, $msg, $headers);

        echo '<h2>OK! Confirme seu cadastro agora</h2>';
        exit;

    }

    require 'template-view.php';
