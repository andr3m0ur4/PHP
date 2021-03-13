<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de teste</title>
</head>
<body>
    
    <?php

        try {
            $pdo = new PDO('mysql:dbname=blog;host=localhost;', 'root', '');

            $sql = "SELECT * FROM posts ORDER BY RAND()";
            $sql = $pdo->query($sql);

            foreach ($sql->fetchAll(PDO::FETCH_OBJ) as $noticia) :
                $cor = rand(0, 999999);
                $len = rand(0, 100);
                ?>
                <div style="width: 250px; float: left; margin: 20px; background-color: #<?= $cor ?>; padding: 20px;">
                    <strong><?= $noticia->titulo ?></strong><br>
                    <p><?= substr($noticia->corpo, 0, $len) ?></p>
                </div>
            <?php endforeach;
        } catch (PDOException $e) {
            die($e->getMessage());
        }

    ?>
</body>
</html>