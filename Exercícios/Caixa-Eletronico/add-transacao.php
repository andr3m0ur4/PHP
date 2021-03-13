<?php

    require './config.php';

    if (isset($_POST['valor']) && !empty($_POST['valor'])) {
        $tipo = $_POST['tipo'];
        $valor = str_replace(',', '.', $_POST['valor']);
        $valor = floatval($valor);

        $sql = 'INSERT INTO historico (id_conta, tipo, valor, data_operacao) VALUES (:id_conta, :tipo, :valor, NOW())';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id_conta', $_SESSION['id']);
        $stmt->bindValue(':tipo', $tipo);
        $stmt->bindValue(':valor', $valor);
        $stmt->execute();

        if ($tipo == 0) {
            // Depósito
            $sql = 'UPDATE contas SET saldo = saldo + :valor WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':valor', $valor);
            $stmt->bindValue(':id', $_SESSION['id']);
            $stmt->execute();
        } else {
            // Saque
            $sql = 'UPDATE contas SET saldo = saldo - :valor WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':valor', $valor);
            $stmt->bindValue(':id', $_SESSION['id']);
            $stmt->execute();
        }

        header('Location: index.php');
        exit;
    }

    require './view-add-transacao.php';
