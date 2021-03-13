<?php

    try {
        $pdo = new PDO('mysql:dbname=blog;host=10.0.0.102', 'andre-moura', 'andre');
    } catch( PDOException $e) {
        die($e->getMessage());
    }

    $propriedade = [
        'curtidor' => 2,
        'id_foto' => '123'
    ];

    $sql = "INSERT INTO notificacoes (id_user, notificacao_tipo, propriedades, link)
        VALUES (:id_user, :notificacao_tipo, :propriedades, :link)";

    $sql = $pdo->prepare($sql);
    $sql->bindValue(':id_user', 1);
    $sql->bindValue(':notificacao_tipo', 'CURTIDA');
    $sql->bindValue(':propriedades', json_encode($propriedade));
    $sql->bindValue(':link', 'http://seusite.com/foto/123');
    $sql->execute();
