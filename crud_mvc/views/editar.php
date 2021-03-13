<h3 class="m-2">Editar</h3>

<?php if ($error) : ?>
    <div class="alert alert-danger">E-mail já existente, tente outro.</div>
<?php endif ?>

<form method="POST" action="/contatos/salvar" class="m-2 pb-2">
    <input type="hidden" name="email_original" value="<?= $contato->email ?>">

    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" class="form-control" value="<?= $contato->nome ?>">
    </div>

    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" name="email" class="form-control" value="<?= $contato->email ?>">
    </div>

    <button id="btn" class="btn btn-primary">Salvar</button>
</form>