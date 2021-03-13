<?php

    require_once './config.php';

    if (!isset($_SESSION['id']) && empty($_SESSION['id'])) {
        header('Location: login.php');
    }

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = addslashes($_GET['id']);

        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
    
            $sql = 'UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
    
            header('Location: index.php');
        }

        $sql = 'SELECT * FROM usuarios WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_OBJ);
        } else {
            header('Location: index.php');
        }
    } else {
        header('Location: index.php');
    }

    require_once './template-editar.php';
