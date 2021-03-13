<?php

    $vendas = [10, 20 ,30, 40, 20];
    $custos = [8, 15, 37, 97, 35];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div style="width: 500px;">
        <canvas id="grafico"></canvas>
    </div>

    <span id="vendas" style="display: none;"><?= implode(',', $vendas) ?></span>
    <span id="custos" style="display: none;"><?= implode(',', $custos) ?></span>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="script.js"></script>

</body>
</html>