<?php

    require 'config.php';
    $h = $_GET['h'];

    if (!empty($h)) {

        $sql = "UPDATE usuarios SET status = '1' WHERE MD5(id) = :id";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(':id', $h);
        $sql->execute();

        echo '<h2>Cadastro confirmado com sucesso</h2>';
    }
