<?php

    try {
        $pdo = new PDO('mysql:dbname=blog;host=10.0.0.102', 'andre-moura', 'andre');
    } catch (PDOException $e) {
        die ($e->getMessage());
    }

    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $dominio = $_POST['dominio'] ?? '';
    $id = $_POST['id'] ?? 0;

    $sql = "UPDATE usuarios SET nome = :nome, email = :email, dominio = :dominio WHERE id = :id";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':dominio', $dominio);
    $sql->bindValue(':id', $id);
    $sql->execute();
