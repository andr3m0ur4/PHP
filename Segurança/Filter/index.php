<?php

    $email = 'andre@teste';
    $numero = '10g';

    /* if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'É um e-mail';
    } else {
        echo 'Não é um e-mail';
    } */

    /* if (filter_var($numero, FILTER_VALIDATE_INT)) {
        echo 'É um número';
    } else {
        echo 'Não é um número';
    } */

    /* $html = 'Este é <strong>meu nome</strong>';
    $html = filter_var($html, FILTER_SANITIZE_SPECIAL_CHARS);
    echo $html; */

    /* $email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
    echo $email; */

    $prioridade = filter_input(INPUT_POST, 'prioridade', FILTER_VALIDATE_INT, [
        'options' => [
            'min_range' => 1,
            'max_range' => 4,
            'default' => 1
        ]
    ]);
    echo "PRIORIDADE: {$prioridade}";

?>
<form method="post">
    <select name="prioridade">
        <option value="1">Prioridade 1</option>
        <option value="2">Prioridade 2</option>
        <option value="3">Prioridade 3</option>
        <option value="4">Prioridade 4</option>
    </select>

    <button>Enviar</button>
</form>