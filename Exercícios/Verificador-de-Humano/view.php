<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Verificador de Humanos</h1>

    <form method="POST" action="./verificador.php">
        <label for="resposta"><?= "$x + $y = " ?></label>
        <input type="number" name="resposta" id="resposta">
        <button>Verificar</button>
    </form>
    
</body>
</html>