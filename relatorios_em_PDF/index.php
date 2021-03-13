<?php

use Mpdf\Mpdf;

ob_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Relatório</h1>
    <table border="1" width="100%">
        <tr>
            <th>Nome do cliente</th>
            <th>Valor do pedido</th>
            <th>Data de entrega</th>
        </tr>
        <tr>
            <td>André Moura</td>
            <td>R$ 1.000</td>
            <td>10/10/2020</td>
        </tr>
        <tr>
            <td>André Moura</td>
            <td>R$ 1.000</td>
            <td>10/10/2020</td>
        </tr>
        <tr>
            <td>André Moura</td>
            <td>R$ 1.000</td>
            <td>10/10/2020</td>
        </tr>
        <tr>
            <td>André Moura</td>
            <td>R$ 1.000</td>
            <td>10/10/2020</td>
        </tr>
        <tr>
            <td>André Moura</td>
            <td>R$ 1.000</td>
            <td>10/10/2020</td>
        </tr>
    </table>
</body>
</html>

<?php

    $html = ob_get_contents();
    ob_end_clean();

    require 'vendor/autoload.php';

    $arquivo = md5(time() . rand(0, 9999)) . '.pdf';

    $mpdf = new Mpdf();
    $mpdf->WriteHTML($html);
    $mpdf->Output($arquivo, 'F');

    // I = abre no Browser
    // D = faz o download
    // F = salva no servidor

    $link = $arquivo;
?>

Faça o download no link:<br>
<a href=" <?= $link ?>" target="_blank">Aqui</a>