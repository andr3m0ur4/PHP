<fieldset>
    <legend>Adicionar uma foto</legend>

    <form method="POST" enctype="multipart/form-data">
        Título:<br>
        <input type="text" name="titulo"><br><br>
        Foto:<br>
        <input type="file" name="arquivo"><br><br>

        <button>Enviar Arquivo</button>
    </form>
</fieldset>
<br><br>
<?php foreach ($fotos as $foto) : ?>

    <img src="/assets/images/galeria/<?= $foto->url ?>" width="300" alt="Foto"><br>
    <figcaption><?= $foto->titulo ?></figcaption>
    <hr>

<?php endforeach ?>