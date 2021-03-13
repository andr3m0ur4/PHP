<?php

    session_start();

    if (isset($_POST['resposta']) && !empty($_POST['resposta'])) {
        $resposta = intval($_POST['resposta']);

        if ($resposta === $_SESSION['resultado']) {
            $msg = 'HUMANO!';
        } else {
            $msg = 'FAKE!';
        }
    } else {
        header('Location: /');
    }

    unset($_SESSION['resultado']);
?>

<h2><?= $msg ?></h2>