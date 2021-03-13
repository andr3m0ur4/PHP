<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Adicionar Reserva</h1>

    <?php if ($flag) : ?>
        <p>Este carro já está reservado neste período.</p>
    <?php endif ?>

    <form method="POST">
        Carro:<br>
        <select name="carro">
            <?php foreach ($lista as $item) : ?>
                <option value="<?= $item->id ?>"><?= $item->nome ?></option>
            <?php endforeach ?>
        </select><br><br>

        Data de início:<br>
        <input type="date" name="data_inicio"><br><br>

        Data de fim:<br>
        <input type="date" name="data_fim"><br><br>

        Nome da pessoa:<br>
        <input type="text" name="pessoa"><br><br>

        <button>Reservar</button>
    </form>
    
</body>
</html>