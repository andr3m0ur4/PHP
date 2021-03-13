<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Sistema de Marketing Multinível</h1>

    <h2>Usuário Logado: <?= $nome ?> (<?= $patente ?>)</h2>

    <a href="cadastro.php">Cadastrar Novo Usuário</a>

    <a href="sair.php">Sair</a>

    <hr>

    <h4>Lista de cadastros</h4>
    
    <?= exibir($lista) ?>

</body>
</html>