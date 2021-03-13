<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa Eletrônico</title>
</head>
<body>

    <h1>Banco XYZ</h1>
    Titular: <?= $conta->titular ?><br>
    Agência: <?= $conta->agencia ?><br>
    Conta: <?= $conta->conta ?><br>
    Saldo: <?= $conta->saldo ?><br>
    <a href="./sair.php">Sair</a>

    <hr>

    <h3>Movimentação/Extrato</h3>

    <a href="./add-transacao.php">Adficionar Transação</a><br><br>

    <table border="1" width="400">
        <tr>
            <th>Data</th>
            <th>Valor</th>
        </tr>
        <?php foreach ($itens as $item) : ?>
            <tr>
                <td><?= date('d/m/Y H:i', strtotime($item->data_operacao)) ?></td>
                <td>
                    <?php if ($item->tipo == 0) : ?>
                        <font color="green">R$ <?= $item->valor ?></font>
                    <?php else : ?>
                        <font color="red">- R$ <?= $item->valor ?></font>
                    <?php endif ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    
</body>
</html>