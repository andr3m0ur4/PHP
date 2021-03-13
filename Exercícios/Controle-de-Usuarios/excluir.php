<?php

    require_once './config.php';

    if (!isset($_SESSION['id']) && empty($_SESSION['id'])) {
        header('Location: login.php');
    }

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = addslashes($_GET['id']);

        $sql = 'DELETE FROM usuarios WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        header('Location: index.php');
    } else {
        header('Location: index.php');
    }
    