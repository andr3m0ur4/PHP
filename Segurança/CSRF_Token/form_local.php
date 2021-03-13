<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="POST" action="http://localhost/login.php">
        E-mail:<br>
        <input type="email" name="email"><br><br>

        Senha:<br>
        <input type="password" name="senha"><br><br>

        <input type="hidden" name="csrf_token" value="69c8d829aba76c83a28b0873334e1c99">

        <button>Entrar</button>
    </form>
    
</body>
</html>