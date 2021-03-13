<?php

    $arquivo = 'imagem.jpg';

    $largura = 200;
    $altura = 200;

    list($largura_original, $altura_original) = getimagesize($arquivo);

    $ratio = $largura_original / $altura_original;

    if ($largura / $altura > $ratio) {
        $largura = $altura * $ratio;
    } else {
        $altura = $largura / $ratio;
    }

    $imagem_final = imagecreatetruecolor($largura, $altura);
    $imagem_original = imagecreatefromjpeg($arquivo);

    imagecopyresampled($imagem_final, $imagem_original,
        0, 0, 0, 0,
        $largura, $altura, $largura_original, $altura_original
    );

    // Alterar o cabeçalho para exibir imagem
    //header('Content-Type: image/jpeg');
    imagejpeg($imagem_final, 'mini_image.jpg');

    echo 'Imagem redimensionada com sucesso!';
