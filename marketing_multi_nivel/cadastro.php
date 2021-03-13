<?php

    session_start();
    require 'config.php';
    $erro = false;

    if (!empty($_POST['email']) && !empty($_POST['nome']) && !empty($_POST['senha'])) {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = md5(addslashes($_POST['senha']));
        $id_pai = $_SESSION['login'];

        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() == 0) {
            $sql = "INSERT INTO usuarios (id_pai, nome, email, senha)
                VALUES (:id_pai, :nome, :email, :senha)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(':id_pai', $id_pai);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', $senha);
            $sql->execute();

            header('Location: index.php');
            exit;
        } else {
            $erro = true;
        }
    }

    require 'template-cadastro.php';
