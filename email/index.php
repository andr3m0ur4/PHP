<?php

    if (isset($_POST['nome']) && !empty($_POST['nome'])) {

        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $mensagem = addslashes($_POST['mensagem']);

        $para = 'andre.benedicto@etec.sp.gov.br';
        $assunto = 'Dúvida do Contato';
        $corpo = "Nome: {$nome} - E-mail: {$email} - Mensagem: {$mensagem}";
        $cabecalho = "From: andre.benedicto@etec.sp.gov.br" . PHP_EOL .
            "Reply-To: {$email}" . PHP_EOL .
            "X-Mailer: PHP/" . phpversion() . PHP_EOL .
            "Content-type: text/html; charset=UTF-8";

        mail($para, $assunto, $corpo, $cabecalho);

        echo '<h2>E-mail enviado com sucesso!</h2>';
        exit;

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="POST">
        Nome:<br>
        <input type="text" name="nome"><br><br>

        E-mail:<br>
        <input type="email" name="email"><br><br>

        Mensagem:<br>
        <textarea name="mensagem" cols="30" rows="10"></textarea><br><br>

        <button>Enviar</button>

    </form>

</body>
</html>