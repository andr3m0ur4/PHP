<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Cadastrar Novo usuário</h1>

    <?php if ($erro) : ?>
        <p>Já existe este usuário cadastrado!</p>
    <?php endif ?>
    
    <form method="POST">
        Nome:<br>
        <input type="text" name="nome"><br><br>

        E-mail:<br>
        <input type="email" name="email"><br><br>

        Senha:<br>
        <input type="password" name="senha"><br><br>

        <button>Cadastrar</button>
    </form>

</body>
</html>