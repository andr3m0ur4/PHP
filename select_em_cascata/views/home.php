<form method="post">
    Escolha o módulo:<br>
    <select name="modulos" id="modulos">
        <option></option>
        <?php foreach ($modulos as $modulo) : ?>
            <option value="<?= $modulo->id ?>"><?= $modulo->titulo ?></option>
        <?php endforeach ?>
    </select><br><br>

    Escolha a aula:<br>
    <select name="aulas" id="aulas"></select><br><br>

    <button>Enviar</button>
</form>