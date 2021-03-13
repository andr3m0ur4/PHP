<?php

    session_start();

    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if (isset($_SESSION['login_tentativas']) && $_SESSION['login_tentativas'] >= 3) {
            echo 'Seu acesso está bloqueado!';
        } else {

            if ($email == 'teste@hotmail.com' && $senha == '123') {
                echo 'ACESSO OK!';
            } else {
                if (!isset($_SESSION['login_tentativas'])) {
                    $_SESSION['login_tentativas'] = 0;
                }

                $_SESSION['login_tentativas']++;

                echo 'Senha errada! Tentativas: ' . $_SESSION['login_tentativas'];
            }
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

        <button>Enviar</button>
    </form>
    
</body>
</html>