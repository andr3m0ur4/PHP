<?php

    try {
        5 / 0;
    } catch (Throwable $e) {
        $msg = "ERRO: {$e->getMessage()}\n";
        $msg .= "ARQUIVO: {$e->getFile()}\n";
        $msg .= "Erro na linha {$e->getLine()}";

        file_put_contents('erro.txt', $msg);
    }

    echo 'Continuação...';
