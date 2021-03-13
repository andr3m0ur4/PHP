<?php

    if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];

        if ($arquivo['error'] == 0) {
            $nome_arquivo = md5(time() . rand(0, 99)) . $arquivo['name'];
            move_uploaded_file($arquivo['tmp_name'], "./arquivos/{$nome_arquivo}");

            echo 'Arquivo enviado com sucesso';
        }
    }

    if (isset($_FILES['arquivos'])) {
        if (count($_FILES['arquivos']['tmp_name']) > 0) {
            for ($i = 0; $i < count($_FILES['arquivos']['tmp_name']); $i++) {
                $nome_arquivo = $_FILES['arquivos']['name'][$i];
                $arquivo = $_FILES['arquivos']['tmp_name'][$i];
                $nome_arquivo = md5(time() . rand(0, 999)) . substr($nome_arquivo, strlen($nome_arquivo) - 4);
                move_uploaded_file($_FILES['arquivos']['tmp_name'][$i], "./arquivos/{$nome_arquivo}");
            }

            echo 'Arquivos enviados com sucesso';
        }
    }
