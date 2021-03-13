<?php

    try {
        $pdo = new PDO('mysql:dbname=blog;host=10.0.0.102', 'andre-moura', 'andre');
    } catch (PDOException $e) {
        die ($e->getMessage());
    }

    $id = $_POST['id'] ?? 0;

    $sql = "DELETE FROM usuarios WHERE id = :id";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
    