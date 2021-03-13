<?php

    try {
        $pdo = new PDO('mysql:dbname=blog;host=localhost;charset=utf8', 'root', '');
    } catch (PDOException $e) {
        die("Erro: {$e->getMessage()}");
    }
    