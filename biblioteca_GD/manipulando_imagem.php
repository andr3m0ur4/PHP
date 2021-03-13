<?php

    $imagem = 'imagem.jpg';

    list($largura_original, $altura_original) = getimagesize($imagem);
    list($largura_mini, $altura_mini) = getimagesize('mini_image.jpg');

    $imagem_final = imagecreatetruecolor($largura_original, $altura_original);

    $imagem_original = imagecreatefromjpeg('imagem.jpg');
    $imagem_mini = imagecreatefromjpeg('mini_image.jpg');

    imagecopy($imagem_final, $imagem_original, 0, 0, 0, 0,
        $largura_original, $altura_original
    );

    imagecopy($imagem_final, $imagem_mini, 100, 200, 0, 0, $largura_mini, $altura_mini);

    //header('Content-Type: image/jpeg');
    imagejpeg($imagem_final, 'imagem_marca_dagua.jpg');

    echo 'Imagem criada com sucesso!';
