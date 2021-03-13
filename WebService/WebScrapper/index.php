<?php

    require 'vendor/autoload.php';

    use KubAT\PhpSimple\HtmlDomParser;

    $html = HtmlDomParser::file_get_html('https://github.com/search?q=instagram');

    $results = $html->find('.repo-list-item');

    echo "TOTAL DE RESULTADOS: " . count($results) . '<br><br>';

    foreach ($results as $result) {
        $titulo = $result->find('.v-align-middle', 0)->plaintext;
        $subtitulo = $result->find('p.mb-1', 0)->plaintext;
        $linguagens = $result->find('a.topic-tag-link');
        $star = $result->find('.flex-wrap .mr-3 .muted-link', 0)->plaintext;
        $language = $result->find('.flex-wrap .mr-3 span', 0)->plaintext;
        $link = $result->find('.v-align-middle', 0)->attr['href'];

        echo "TÍtulo: $titulo<br>";
        echo "Subtítulo: $subtitulo<br>";

        echo "Linguagens: ";
        foreach ($linguagens as $linguagem) {
            echo "{$linguagem->plaintext} - ";
        }

        echo "<br>Rate: $star<br>";
        echo "Linguagem de Programação: $language<br>";
        echo "Link: <a href='https://github.com{$link}' target='_blank'>$link</a>";

        echo '<hr>';
        
    }
