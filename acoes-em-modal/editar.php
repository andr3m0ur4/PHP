<?php

    sleep(1);

    try {
        $pdo = new PDO('mysql:dbname=blog;host=10.0.0.102', 'andre-moura', 'andre');
    } catch (PDOException $e) {
        die ($e->getMessage());
    }

    $id = $_POST['id'] ?? '';

    if (!empty($id)) {
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $usuario = $sql->fetch(PDO::FETCH_OBJ);

            echo json_encode($usuario);
        }
    }
