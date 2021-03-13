<?php

    try {
        $pdo = new PDO('mysql:dbname=blog;host=localhost;charset=utf8', 'root', '');
    } catch (PDOException $e) {
        die("Erro: {$e->getMessage()}");
    }

    $sexos = [
        '0' => 'Masculino',
        '1' => 'Feminino'
    ];

    if (isset($_POST['sexo']) && $_POST['sexo'] != '') {
        $sexo = $_POST['sexo'];

        $sql = "SELECT * FROM usuarios WHERE sexo = :sexo";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':sexo', $sexo);
        $sql->execute();
    } else {
        $sexo = '';
        $sql = "SELECT * FROM usuarios";
        $sql = $pdo->query($sql);
    }

    if ($sql->rowCount() > 0) {
        $usuarios = $sql->fetchAll(PDO::FETCH_OBJ);
    }

    require 'template-index.php';
