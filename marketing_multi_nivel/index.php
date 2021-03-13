<?php

    session_start();
    require 'config.php';
    require 'functions.php';

    if (empty($_SESSION['login'])) {
        header('Location: login.php');
        exit;
    }

    $id = $_SESSION['login'];

    $sql = "SELECT usuarios.nome, patentes.nome AS patente
        FROM usuarios
        LEFT JOIN patentes
        ON (usuarios.patente = patentes.id)
        WHERE usuarios.id = :id";
    $sql = $pdo->prepare($sql);
    $sql->bindValue('id', $id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $sql = $sql->fetch(PDO::FETCH_OBJ);
        $nome = $sql->nome;
        $patente = $sql->patente;
    } else {
        header('Location: login.php');
        exit;
    }

    $lista = listar($id, $limite);

    require 'template.php';
