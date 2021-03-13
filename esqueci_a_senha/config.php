<?php

    try {

        $dsn = "mysql:dbname=andrem24_blog;host=localhost;charset=utf8";
        $dbuser = 'andrem24_andre';
        $dbpass  ='andre-moura';
        $pdo = new PDO($dsn, $dbuser, $dbpass);
    } catch (PDOException $e) {
        die("Erro: {$e->getMessage()}");
    }
    