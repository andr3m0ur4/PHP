<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Área interna do sistema</h1>
    <p>Usuário: <?= $usuario_atual->email ?> - <a href="./sair.php">Sair</a></p>
    <p>Link: http://project.php/cadastrar.php?codigo=<?= $usuario_atual->codigo ?></p>

    <a href="./tags.php">Tags</a><br><br>
    
    <a href="adicionar.php">Adicionar Novo Usuário</a>

    <br><br>

    <form method="GET">
        <select name="ordem" onchange="this.form.submit()">
            <option value=""></option>
            <option value="nome" <?= $ordem == 'nome' ? 'selected' : '' ?>>Pelo nome</option>
            <option value="idade" <?= $ordem == 'idade' ? 'selected' : '' ?>>Pela idade</option>
        </select>
    </form>

    <br>

    <table border="1" width="100%">
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Idade</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($usuarios as $usuario) : ?>
            <tr>
                <td><?= $usuario->nome ?></td>
                <td><?= $usuario->email ?></td>
                <td><?= $usuario->idade ?></td>
                <td>
                    <a href="editar.php?id=<?= $usuario->id ?>">Editar</a> - 
                    <a href="excluir.php?id=<?= $usuario->id ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br><br>

    <form action="./recebedor.php" method="post" enctype="multipart/form-data">
        <h3>Arquivo:</h3>
        <input type="file" name="arquivo"><br><br>

        <input type="file" name="arquivos[]" multiple><br><br>

        <button>Enviar</button>
    </form>

    <br><br>
    
    <form method="POST">
        <fieldset>
            <label for="nome">Nome:</label><br>
            <input type="text" name="nome"><br><br>

            <label for="mensagem">Mensagem</label><br>
            <textarea name="mensagem"></textarea><br><br>

            <button>Enviar Mensagem</button>
        </fieldset>
    </form>

    <?php if (count($mensagens) > 0) : ?>
        <?php foreach ($mensagens as $mensagem) : ?>
            <p>
                <strong><?= $mensagem->nome ?></strong><br>
                <?= $mensagem->msg ?>
            </p>
            <hr>
        <?php endforeach ?>
    <?php else : ?>
        <p>Não há mensagens.</p>
    <?php endif ?>

</body>
</html>