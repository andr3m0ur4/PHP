<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h3>Calculadora de Imposto</h3>

    <form method="POST">
        <label for="valor">Valor do produto:</label><br>
        <input type="number" name="produto" id="produto" step="any"><br><br>

        <label for="imposto">Taxa de imposto (em %)</label><br>
        <input type="number" name="imposto" id="imposto" step="any"><br><br>

        <button>Calcular</button>
    </form>

    <?php if (isset($produto)) : ?>
        <p>
            Valor do Produto: R$ <?= $produto ?><br>
            Taxa de imposto: <?= $taxa_imposto ?>%
        </p>
        <hr>
        <p>
            Imposto: R$ <?= $imposto ?><br>
            Produto: R$ <?= $valor_produto ?>
        </p>
    <?php endif ?>

</body>
</html>