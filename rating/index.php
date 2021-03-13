<?php

    require 'config.php';

    $sql = "SELECT * FROM filmes";
    $sql = $pdo->query($sql);
    $filmes = [];

    if ($sql->rowCount() > 0) {
        $filmes = $sql->fetchAll(PDO::FETCH_OBJ);
    }

    require 'template.php';
