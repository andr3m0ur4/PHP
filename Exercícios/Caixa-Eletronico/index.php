<?php

    require './config.php';

    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $id = $_SESSION['id'];

        $sql = 'SELECT * FROM contas WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $conta = $stmt->fetch(PDO::FETCH_OBJ);
        } else {
            header('Location: login.php');
            exit;
        }
    } else {
        header('Location: login.php');
        exit;
    }

    $sql = 'SELECT * FROM historico WHERE id_conta = :id_conta';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id_conta', $id);
    $stmt->execute();

    $itens = [];

    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll(PDO::FETCH_OBJ) as $item) {
            $itens[] = $item;
        }
    }

    require './view.php';
