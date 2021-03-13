<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="post">
        <select name="sexo">
            <option></option>
            <option value="0" <?= $sexo == '0' ? 'selected' : '' ?>>Masculino</option>
            <option value="1" <?= $sexo == '1' ? 'selected' : '' ?>>Feminino</option>
        </select>

        <button>Filtrar</button>
    </form>

    <br>

    <table border="1" width="600">
        <tr>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Idade</th>
        </tr>

        <?php foreach ($usuarios as $usuario) : ?>
            <tr>
                <td><?= $usuario->nome ?></td>
                <td><?= $sexos[$usuario->sexo] ?></td>
                <td><?= $usuario->idade ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    
</body>
</html>