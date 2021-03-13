<?php

    session_start();

    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = md5(time() . rand(0, 999));
    }


    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if ($_SESSION['csrf_token'] == $_POST['csrf_token']) {
            if ($email == 'teste@hotmail.com' && $senha == '123') {
                echo 'ACESSO OK!';
            } else {
                echo 'Senha errada!';
            }
        } else {
            echo 'Este form foi enviado de outro site!';
        }

        echo '<hr>';
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="POST">
        E-mail:<br>
        <input type="email" name="email"><br><br>

        Senha:<br>
        <input type="password" name="senha"><br><br>

        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

        <button>Entrar</button>
    </form>
    
</body>
</html>