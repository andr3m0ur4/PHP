<?php

    require_once './config.php';

    if (!isset($_SESSION['id']) && empty($_SESSION['id'])) {
        header('Location: login.php');
    }

    require_once './config.php';

    $sql = 'SELECT caracteristicas FROM usuarios';
    $sql = $pdo->query($sql);

    if ($sql->rowCount() > 0) {
        $lista = $sql->fetchAll(PDO::FETCH_OBJ);

        $caracteristica = [];

        foreach ($lista as $usuario) {
            if (!empty($usuario->caracteristicas)) {
                $palavras = explode(',', $usuario->caracteristicas);

                foreach ($palavras as $palavra) {
                    $palavra = trim($palavra);
    
                    if (isset($caracteristica[$palavra])) {
                        $caracteristica[$palavra]++;
                    } else {
                        $caracteristica[$palavra] = 1;
                    }
                }
            }
        }

        arsort($caracteristica);

        $palavras = array_keys($caracteristica);
        $contagens = array_values($caracteristica);

        $maior = max($contagens);

        $tamanhos = array(11, 15, 20, 30);

        for ($i = 0; $i < count($palavras); $i++) {
            $n = $contagens[$i] / $maior;

            $h = ceil($n * count($tamanhos));

            echo "<p style='font-size: {$tamanhos[$h - 1]}px;'>{$palavras[$i]} ({$contagens[$i]})</p>";
        }
        //require_once './template-tags.php';
    }