<?php

    require 'config.php';

    if (!empty($_GET['id']) && !empty($_GET['voto'])) {
        $id = intval($_GET['id']);
        $voto = intval($_GET['voto']);

        if ($voto >= 1 && $voto <= 5) {
            $sql = "INSERT INTO votos (id_filme, nota) VALUES (:id_filme, :nota)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(':id_filme', $id);
            $sql->bindValue(':nota', $voto);
            $sql->execute();

            $sql = "UPDATE filmes
                SET
                    media = (SELECT AVG(nota) FROM votos WHERE votos.id_filme = filmes.id)
                WHERE id = :id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();

            header('Location: index.php');
            exit;
        }
    }
