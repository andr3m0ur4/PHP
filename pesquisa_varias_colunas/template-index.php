<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Digite email/CPF do usuário</h1>

    <form method="post">
        <input type="text" name="campo">
        <button>Pesquisar</button>
    </form>

    <hr>

    <h2><?= "Nome: {$data->nome}" ?></h2>
    
</body>
</html>