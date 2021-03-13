<?php

    try {
        $pdo = new PDO('mysql:dbname=blog;host=10.0.0.102', 'andre-moura', 'andre');
    } catch (PDOException $e) {
        die ($e->getMessage());
    }

    $pessoas = [];

    if (!empty($_POST['texto'])) {
        $texto = $_POST['texto'];
        
        $sql = "SELECT * FROM pessoas WHERE nome LIKE :texto";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':texto', "%{$texto}%");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $pessoa) {
                $pessoas[] = [
                    'nome' => $pessoa->nome,
                    'id' => $pessoa->id
                ];
            }
        }

    }

    echo json_encode($pessoas);
