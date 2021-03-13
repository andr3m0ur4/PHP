<?php

    $array = [
        'nome' => 'André',
        'idade'=> 30
    ];

    $idade = $array['idade'] ?? 0;
    echo "IDADE: $idade";
