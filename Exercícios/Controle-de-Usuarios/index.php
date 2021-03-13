<?php

    require_once './config.php';

    if (!isset($_SESSION['id']) && empty($_SESSION['id'])) {
        header('Location: login.php');
    }

    require_once './config.php';

    $sql = 'SELECT email, codigo FROM usuarios WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_SESSION['id']);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $usuario_atual = $stmt->fetch(PDO::FETCH_OBJ);
    }

    $ordem = '';

    if (isset($_GET['ordem']) && !empty($_GET['ordem'])) {
        $ordem = addslashes($_GET['ordem']);
        $sql = 'SELECT * FROM usuarios ORDER BY ' . $ordem;
    } else {
        $sql = 'SELECT * FROM usuarios';
    }

    $sql = $pdo->query($sql);

    if ($sql->rowCount() > 0) {
        foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $usuario) {
            $usuarios[] = $usuario;
        }
    }

    if (isset($_POST['nome']) && !empty($_POST['nome'])) {
        $nome = addslashes($_POST['nome']);
        $mensagem = addslashes($_POST['mensagem']);

        $sql = 'INSERT INTO mensagens (nome, msg) VALUES (:nome, :msg)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':msg', $mensagem);
        $stmt->execute();
    }

    $sql = 'SELECT * FROM mensagens ORDER BY data_msg DESC';
    $sql = $pdo->query($sql);

    $mensagens = [];

    if ($sql->rowCount() > 0) {
        foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $mensagem) {
            $mensagens[] = $mensagem;
        }
    }

    require_once './template-index.php';
