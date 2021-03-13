<?php

    try {
        $pdo = new PDO('mysql:dbname=blog;host=10.0.0.102', 'andre-moura', 'andre');
    } catch( PDOException $e) {
        die($e->getMessage());
    }

    $sql = "SELECT * FROM notificacoes WHERE id_user = 1 AND lido = 0";
    $sql = $pdo->query($sql);

    $array = [
        'qtd' => 0
    ];

    if ($sql->rowCount() > 0) {
        $array['qtd'] = $sql->rowCount();
    }

    echo json_encode($array);
