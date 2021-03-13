<?php

    if (!empty($_FILES['foto']['tmp_name'])) {

        if ($_FILES['foto']['type'] == 'image/jpeg') {
            $nome = md5(rand(0, 9999) . time()) . '.jpg';

            move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/' . $nome);

            echo 'Foto carregada com sucesso!';
        }
    }
