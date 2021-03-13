<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php if (count($filmes) > 0) : ?>
        <?php foreach ($filmes as $filme) : ?>
            <fieldset>
                <strong><?= $filme->titulo ?></strong><br>
                <a href="votar.php?id=<?= $filme->id?>&voto=1"><img src="star.png" alt="star" height="20"></a>
                <a href="votar.php?id=<?= $filme->id?>&voto=2"><img src="star.png" alt="star" height="20"></a>
                <a href="votar.php?id=<?= $filme->id?>&voto=3"><img src="star.png" alt="star" height="20"></a>
                <a href="votar.php?id=<?= $filme->id?>&voto=4"><img src="star.png" alt="star" height="20"></a>
                <a href="votar.php?id=<?= $filme->id?>&voto=5"><img src="star.png" alt="star" height="20"></a>
                (<?= $filme->media ?>)
            </fieldset>
        <?php endforeach ?>
    <?php else : ?>
        <p>Não há filmes cadastrados!</p>
    <?php endif ?>
    
</body>
</html>