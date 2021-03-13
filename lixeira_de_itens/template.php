<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Lista de usuários</h1>

    <table border="0" width="100%">
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($data as $usuario) : ?>
            <tr>
                <td><?= $usuario->nome ?></td>
                <td><?= $usuario->email ?></td>
                <td><a href="excluir.php?id=<?= $usuario->id ?>">Excluir</a></td>
            </tr>
        <?php endforeach ?>
    </table>
    
</body>
</html>