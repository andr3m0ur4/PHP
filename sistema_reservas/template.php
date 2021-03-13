<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Reservas</h1>

    <a href="reservar.php">Adicionar Reserva</a>
    <br><br>

    <form>
        <select name="ano">
            <?php for ($q = date('Y') + 2; $q >= 2010; $q--) : ?>
                <option <?= $q == $ano_atual ? 'selected' : '' ?>><?= $q ?></option>
            <?php endfor ?>
        </select>

        <select name="mes">
            <option <?= verificarMes($mes_atual, 1) ?>>01</option>
            <option <?= verificarMes($mes_atual, 2) ?>>02</option>
            <option <?= verificarMes($mes_atual, 3) ?>>03</option>
            <option <?= verificarMes($mes_atual, 4) ?>>04</option>
            <option <?= verificarMes($mes_atual, 5) ?>>05</option>
            <option <?= verificarMes($mes_atual, 6) ?>>06</option>
            <option <?= verificarMes($mes_atual, 7) ?>>07</option>
            <option <?= verificarMes($mes_atual, 8) ?>>08</option>
            <option <?= verificarMes($mes_atual, 9) ?>>09</option>
            <option <?= verificarMes($mes_atual, 10) ?>>10</option>
            <option <?= verificarMes($mes_atual, 11) ?>>11</option>
            <option <?= verificarMes($mes_atual, 12) ?>>12</option>
        </select>

        <button>Mostrar</button>
    </form>

    <?php if ($flag) exit ?>

    <hr>

    <table border="1" width="100%">
        <tr>
            <th>Dom</th>
            <th>Seg</th>
            <th>Ter</th>
            <th>Qua</th>
            <th>Qui</th>
            <th>Sex</th>
            <th>Sab</th>
        </tr>
        <?php for ($l = 0; $l < $linhas; $l++) : ?>
            <tr>
                <?php for ($q = 0; $q < 7; $q++) : ?>
                    <td>
                        <?= formatarData($w = formatarCalendario($l, $q, $data_inicio)) ?><br><br>

                        <?php foreach ($lista as $item) : ?>
                            <?= verificarReserva($item, $w) ?>
                        <?php endforeach ?>
                    </td>
                <?php endfor ?>
            </tr>
        <?php endfor ?>
    </table>
    
</body>
</html>