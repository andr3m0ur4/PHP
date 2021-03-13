<h3>Albuns</h3>

<ul>
    <?php foreach ($albuns as $album) : ?>
        <li>
            <a href="/galeria/abrir/<?= $album->slug ?>"><?= $album->titulo ?></a>
        </li>
    <?php endforeach ?>
</ul>