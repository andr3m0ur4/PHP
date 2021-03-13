<a class="btn btn-primary m-3 modal-ajax" href="/contatos/adicionar">ADICIONAR</a>

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
                <a class="btn btn-sm btn-primary modal-ajax" href="/contatos/editar/<?= $item->id ?>">EDITAR</a>
                <a class="btn btn-sm btn-primary" href="/contatos/excluir/<?= $item->id ?>">EXCLUIR</a>
            </td>
        </tr>
    <?php endforeach ?>
</table>