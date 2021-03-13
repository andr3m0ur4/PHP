<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="POST">
    <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?= $usuario->nome ?>"><br><br>

        <label for="email">E-mail:</label>
        <input type="email" name="email" value="<?= $usuario->email?>"><br><br>

        <label for="nome">Senha:</label>
        <input type="password" name="senha"><br><br>

        <button>Atualizar</button>
    </form>

</body>
</html>