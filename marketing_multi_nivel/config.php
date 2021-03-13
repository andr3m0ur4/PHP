<?php

    try {
        global $pdo;
        $pdo = new PDO('mysql:dbname=marketing_multi_nivel;host=localhost;charset=utf8', 'andre-moura', 'andre');
    } catch (PDOException $e) {
        die("ERRO: {$e->getMessage()}");
    }

    $limite = 3;

    $patentes = [

    ];
    