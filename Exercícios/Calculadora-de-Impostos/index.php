<?php

    if (isset($_POST['produto']) && !empty($_POST['produto'])) {
        $produto = floatval($_POST['produto']);
        $taxa_imposto = floatval($_POST['imposto']);

        $imposto = $produto * ($taxa_imposto / 100);
        $valor_produto = $produto - $imposto;
    }

    require './view.php';
