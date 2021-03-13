<?php

    try {
        $pdo = new PDO('mysql:dbname=blog;host=localhost', 'andre-moura', 'andre');
    } catch (PDOException $e) {
        die("ERRO: {$e->getMessage()}");
    }

    $dominio = $_SERVER['HTTP_HOST'];
    
    $sql = "SELECT * FROM usuarios WHERE dominio = :dominio";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':dominio', $dominio);
    $sql->execute();

    if ($sql->rowCount() > 0) {

        $cliente = $sql->fetch();

        echo "CLIENTE QUE ACESSOU: {$cliente['nome']}<br><br>";

        if (file_exists("clientes/{$cliente['id']}/index.html")) {
            require "clientes/{$cliente['id']}/index.html";
        } else {
            echo 'Sistema fora do ar.';
        }
    } else {
        echo 'Sistema fora do ar.';
    }
