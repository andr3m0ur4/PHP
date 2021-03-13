<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

    <header>
        <h1>Meu sistema de contatos</h1>
    </header>

    <section>
        <?= $this->loadViewInTemplate($viewName, $viewData) ?>
    </section>

    <footer>
        Todos os direitos reservados
    </footer>

    <script src="/assets/js/script.js"></script>

</body>
</html>