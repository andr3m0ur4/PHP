<?php

    $resultado = '';

    if (isset($_POST['operacao'])) {
        if (!empty($_POST['x']) && !empty($_POST['operacao']) && !empty($_POST['y'])) {
            $x = floatval($_POST['x']);
            $operacao = addslashes($_POST['operacao']);
            $y = floatval($_POST['y']);
            $resultado = "$x $operacao $y = ";

            switch ($operacao) {
                case '+':
                    $resultado .= $x + $y;
                    break;
                case '-':
                    $resultado .= $x - $y;
                    break;
                case '*':
                    $resultado .= $x * $y;
                    break;
                case '/':
                    $resultado .= $x / $y;
                    break;
            }
        }
    }

    require './view.php';
