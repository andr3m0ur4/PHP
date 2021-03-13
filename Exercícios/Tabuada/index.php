<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Tabuada</h1>

    <table border="1">
        <?php for ($i = 1; $i < 10; $i++) : ?>
            <tr>
                <?php for ($j = 1; $j < 10; $j++) : ?>
                    <td><?= $j * $i ?> &nbsp;</td>
                <?php endfor ?>
            </tr>
        <?php endfor ?>
    </table>

</body>
</html>