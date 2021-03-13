<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de contatos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <main class="container-fluid">
        <h1>Contatos</h1>

        <a class="btn btn-primary mb-4 modal-ajax" href="adicionar.php">ADICIONAR</a>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>E-MAIL</th>
                <th>AÇÕES</th>
            </tr>

            <?php foreach ($lista as $item) : ?>
                <tr>
                    <td><?= $item->id ?></td>
                    <td><?= $item->nome ?></td>
                    <td><?= $item->email ?></td>
                    <td>
                        <a class="btn btn-sm btn-primary modal-ajax" href="editar.php?id=<?= $item->id ?>">EDITAR</a>
                        <a class="btn btn-sm btn-primary" href="excluir.php?id=<?= $item->id ?>">EXCLUIR</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </main>

    <div class="modal" id="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
    
</body>
</html>