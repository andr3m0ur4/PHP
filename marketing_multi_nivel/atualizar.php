<?php

    session_start();
    require 'config.php';
    require 'functions.php';
    $usuarios = [];

    $sql = "SELECT id FROM usuarios";
    $sql = $pdo->query($sql);

    if ($sql->rowCount() > 0) {
        $usuarios = $sql->fetchAll(PDO::FETCH_OBJ);

        foreach ($usuarios as $chave => $usuario) {
            $usuarios[$chave]->filhos = calcularCadastros($usuario->id, $limite);
        }
    }

    $sql = "SELECT * FROM patentes ORDER BY min DESC";
    $sql = $pdo->query($sql);
    $patentes = [];

    if ($sql->rowCount() > 0) {
        $patentes = $sql->fetchAll(PDO::FETCH_OBJ);
    }

    foreach ($usuarios as $usuario) {
        foreach ($patentes as $patente) {
            if (intval($usuario->filhos) >= intval($patente->min)) {

                $sql = "UPDATE usuarios SET patente = :patente WHERE id = :id";
                $sql = $pdo->prepare($sql);
                $sql->bindValue(':patente', $patente->id);
                $sql->bindValue(':id', $usuario->id);
                $sql->execute();

                break;
            }
        }
    }
