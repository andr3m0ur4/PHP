<?php

    $data = new stdClass();
    $data->nome = '';

    if (!empty($_POST['campo'])) {

        $campo = $_POST['campo'];

        try {
            $pdo = new PDO('mysql:dbname=blog;host=localhost;charset=utf8', 'root', '');
        } catch (PDOException $e) {
            die("Erro: {$e->getMessage()}");
        }

        $sql = "SELECT * FROM usuarios WHERE email = :email OR cpf = :cpf";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':email', $campo);
        $sql->bindValue(':cpf', $campo);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetch(PDO::FETCH_OBJ);
        }

    }

    require 'template-index.php';
