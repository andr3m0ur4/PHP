<?php

    require 'environment.php';

    $config = [];

    if (ENVIRONMENT == 'development') {
        define('BASE_URL', 'http://localhost');
        $config = [
            'dbname' => 'classificados',
            'host' => 'localhost',
            'dbuser' => 'andre-moura',
            'dbpass' => 'andre'
        ];
    } else {
        define('BASE_URL', 'https://meusite.com.br');
        $config = [
            'dbname' => 'estrutura_mvc',
            'host' => 'localhost',
            'dbuser' => 'andre-moura',
            'dbpass' => 'andre'
        ];
    }

    global $db;

    try {
        $db = new PDO("mysql:dbname={$config['dbname']};host={$config['host']};charset=utf8",
        $config['dbuser'], $config['dbpass']);
    } catch (PDOException $e) {
        die("ERRO: {$e->getMessage()}");
    }
