<?php

    try {
        $pdo = new PDO('mysql:dbname=blog;host=10.0.0.102', 'andre-moura', 'andre');
    } catch( PDOException $e) {
        die($e->getMessage());
    }

    $notificacoes = [];

    $sql = "SELECT * FROM notificacoes WHERE id_user = 1";
    $sql = $pdo->query($sql);

    if ($sql->rowCount() > 0) {
        $notificacoes = $sql->fetchAll(PDO::FETCH_OBJ);
    }

    echo json_encode($notificacoes);
