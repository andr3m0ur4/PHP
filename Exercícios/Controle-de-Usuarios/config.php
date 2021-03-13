<?php

    session_start();

    $dsn = 'mysql:dbname=blog;host=10.0.0.104;charsert=utf8';
    $dbuser = 'andre-moura';
    $dbpass = 'andre';

    try {
        $pdo = new PDO($dsn, $dbuser, $dbpass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Falhou a conexão: {$e->getMessage()}";
        exit;
    }
    