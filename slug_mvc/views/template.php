<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

    <h1>Fotografias Beltrano</h1>

    <a href="/">Home</a>
    <a href="/galeria">Galeria</a>

    <hr>

    <?= $this->loadViewInTemplate($viewName, $viewData) ?>

    <script src="/assets/js/script.js"></script>

</body>
</html>