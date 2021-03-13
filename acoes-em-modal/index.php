<?php

    try {
        $pdo = new PDO('mysql:dbname=blog;host=10.0.0.102', 'andre-moura', 'andre');
    } catch (PDOException $e) {
        die ($e->getMessage());
    }

    $sql = "SELECT * FROM usuarios";
    $sql = $pdo->query($sql);

    $usuarios = $sql->fetchAll(PDO::FETCH_OBJ);

    require 'template.php';
    