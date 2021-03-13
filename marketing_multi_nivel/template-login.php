<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php if ($erro) : ?>
        <p>Usuários e/ou Senha inválidos!</p>
    <?php endif ?>

    <form method="POST">
        E-mail:<br>
        <input type="email" name="email"><br><br>

        Senha:<br>
        <input type="password" name="senha"><br><br>

        <button>Entrar</button>
    </form>
    
</body>
</html>