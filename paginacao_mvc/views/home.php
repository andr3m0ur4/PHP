<table width="300">
    <?php foreach ($items as $item) : ?>
        <tr>
            <td><?= $item->id ?></td>
            <td><?= $item->title ?></td>
        </tr>
    <?php endforeach ?>
</table>

<?php for ($i = 0; $i < $paginas; $i++) : ?>
    <?php if ($pagina_atual == ($i + 1)) : ?>
        <a href="/?p=<?= $i + 1 ?>"><strong><?= $i + 1 ?></strong></a>
    <?php else : ?>
        <a href="/?p=<?= $i + 1 ?>"><?= $i + 1 ?></a>
    <?php endif ?>
<?php endfor ?>