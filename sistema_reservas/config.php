<?php

    try {
        $pdo = new PDO('mysql:dbname=sistema_reservas;host=localhost;charset=utf8', 'andre-moura', 'andre');
    } catch (PDOException $e) {
        die("Erro: {$e->getMessage()}");
    }
