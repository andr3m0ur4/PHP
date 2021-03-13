<?php

    try {
        $pdo = new PDO('mysql:dbname=usuarios_online;host=localhost;charset=utf8', 'andre-moura', 'andre');
    } catch (PDOException $e) {
        die("ERRO: {$e->getMessage()}");
    }

    $ip = $_SERVER['REMOTE_ADDR'];
    $hora = date('H:i:s');
    $sql = "INSERT INTO acessos (ip, hora) VALUES (:ip, :hora)";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':ip', $ip);
    $sql->bindValue(':hora', $hora);
    $sql->execute();
    
    $sql = "DELETE FROM acessos WHERE hora < :hora";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':hora', date('H:i:s', strtotime('-5 minutes')));
    $sql->execute();

    $sql = "SELECT ip FROM acessos WHERE hora > :hora GROUP BY ip";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':hora', date('H:i:s', strtotime('-5 minutes')));
    $sql->execute();
    $contagem = $sql->rowCount();

    echo "ONLINE: {$contagem}";
