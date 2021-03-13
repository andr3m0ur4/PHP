<?php

    require './config.php';

    if (isset($_POST['agencia']) && !empty($_POST['agencia'])) {
        $agencia = addslashes($_POST['agencia']);
        $conta = addslashes($_POST['conta']);
        $senha = md5(addslashes($_POST['senha']));

        $sql = 'SELECT * FROM contas WHERE agencia = :agencia AND conta = :conta AND senha = :senha';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':agencia', $agencia);
        $stmt->bindValue(':conta', $conta);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $conta = $stmt->fetch(PDO::FETCH_OBJ);

            $_SESSION['id'] = $conta->id;

            header('Location: index.php');
            exit;
        }
    }

    require './view-login.php';
