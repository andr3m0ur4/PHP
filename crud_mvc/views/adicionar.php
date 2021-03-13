<h3 class="m-2">Adicionar</h3>

<?php if ($error) : ?>
    <div class="alert alert-danger">E-mail já existente, tente outro.</div>
<?php endif ?>

<form method="POST" action="/contatos/salvar" class="m-2 pb-2">
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" name="email" class="form-control">
    </div>

    <button id="btn" class="btn btn-primary">Adicionar</button>
</form>