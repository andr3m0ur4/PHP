<?php

    require './config.php';

    $sql = "SELECT * fROM usuarios WHERE status = 1";
    $sql = $pdo->query($sql);

    if ($sql->rowCount() > 0) {
        $data = $sql->fetchAll(PDO::FETCH_OBJ);
    }

    include './template.php';
