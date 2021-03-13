<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Sistema</h1>

    <?php if ($usuarios->temPermissao('ADD')) : ?>
        <a href="#">Adicionar Documentos</a><br><br>
    <?php endif ?>

    <?php if ($usuarios->temPermissao('SECRET')) : ?>
        <a href="secreto.php">Página Secreta</a><br><br>
    <?php endif ?>

    <table border="1" width="100%">
        <tr>
            <th>Nome do arquivo</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($lista as $item) : ?>
            <tr>
                <td><?= $item->titulo ?></td>
                <td>
                    <?php if ($usuarios->temPermissao('EDIT')) : ?>
                        <a href="#">Editar</a>
                    <?php endif ?>
                    <?php if ($usuarios->temPermissao('DEL')) : ?>
                        <a href="#">Excluir</a>
                    <?php endif ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    
</body>
</html>