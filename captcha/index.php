<?php

    session_start();

    if (!isset($_SESSION['captcha'])) {
        $n = rand(1000, 9999);
        $_SESSION['captcha'] = $n;
    }

    if (!empty($_POST['codigo'])) {
        $c = $_POST['codigo'];

        if ($c == $_SESSION['captcha']) {
            echo 'ACERTOU!';
        } else {
            echo 'ERROU!';
        }

        $n = rand(1000, 9999);
        $_SESSION['captcha'] = $n;
    }
?>

    <img src="imagem.php" alt="" width="100" height="50">

    <br><br>

    <form method="POST">
        <input type="text" name="codigo">
        <button>Verificar</button>
    </form>