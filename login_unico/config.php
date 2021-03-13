<?php

    try {
        $pdo = new PDO('mysql:dbname=login_unico;host=localhost;charset=utf8', 'andre-moura', 'andre');
    } catch (PDOException $e) {
        die("Erro: {$e->getMessage()}");
    }