<?php

    require 'Pessoa.php';

    $pessoa = new Pessoa('André Moura', '01/06/1989');

    echo "{$pessoa->getNome()} tem {$pessoa->getIdade()} anos";
