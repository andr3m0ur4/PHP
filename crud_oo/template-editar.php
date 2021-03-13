<div class="modal-header">
    <h5 class="modal-title">Editar</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form method="POST" action="editar.php" class="col-6">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="email_original" value="<?= $info->email ?>">

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control" value="<?= $info->nome ?>">
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" class="form-control" value="<?= $info->email ?>">
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    <button type="button" id="btn" class="btn btn-primary">Salvar</button>
</div>