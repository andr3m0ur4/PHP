<?php

    try {
        $dsn = "mysql:dbname=blog;host=localhost";
        $dbuser = "andre-moura";
        $dbpass = "andre";
        $pdo = new PDO($dsn, $dbuser, $dbpass);
    } catch (PDOException $e) {
        die($e->getMessage());
    }

    /*
    1. Calcular a quantidade total de páginas.
    2. Definir a página
    3. Fazer a consulta com LIMIT
    */

    $qtd_por_pag = 20;
    $total = 0;
    $sql = "SELECT COUNT(*) AS c FROM posts";
    $sql = $pdo->query($sql);
    $sql = $sql->fetch(PDO::FETCH_OBJ);
    $total = $sql->c;
    $paginas = $total / $qtd_por_pag;
    $pag_atual = 1;

    if (isset($_GET['p']) && !empty($_GET['p'])) {
        $pag_atual = addslashes($_GET['p']);
    }

    $pag = ($pag_atual - 1) * $qtd_por_pag;

    $sql = "SELECT * FROM posts LIMIT $pag, $qtd_por_pag";
    $sql = $pdo->query($sql);

    echo '<hr>';

    if ($sql->rowCount() > 0) {
        foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $item) {

            echo "{$item->id} - {$item->titulo}<br>";

        }
    }

    echo '<hr>';

    for ($qtd = 0; $qtd < $paginas; $qtd++) {
        echo '<a href="./?p=' . ($qtd + 1) . '">[ ' . ($qtd + 1) . ' ]</a>';
    }

    //echo "TOTAL DE PÁGINAS: {$paginas}";
