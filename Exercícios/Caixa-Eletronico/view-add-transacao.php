<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="POST">
        <label for="tipo">Tipo de transação:</label><br>
        <select name="tipo" id="tipo">
            <option value="0">Depósito</option>
            <option value="1">Retirada</option>
        </select><br><br>

        <label for="valor">Valor:</label><br>
        <input type="text" name="valor" pattern="[0-9.,]{1,}"><br><br>

        <button>Adicionar</button>
    </form>
    
</body>
</html>