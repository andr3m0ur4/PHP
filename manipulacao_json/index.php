<?php

    $json = file_get_contents('https://api.hgbrasil.com/weather?woeid=434984');
    $json = json_decode($json);

    $obj = new stdClass;
    $obj->date = "14/01";
    $obj->weekday = "Qui";
    $obj->max = 30;
    $obj->min = 25;
    $obj->description = "Dia ensolarado";
    $obj->condition = "hot";
    
    $json->results->forecast[] = $obj;

    /* echo 'Dias retornados: ' . count($json->results->forecast) . '<br>';

    foreach ($json->results->forecast as $dia) {
        echo "Dia: {$dia->date} - {$dia->weekday} - Baixa: {$dia->min} - Alta: {$dia->max} - ({$dia->description})<br>";
    } */

    //echo json_encode($json);

    $json = [
        'nome' => 'André',
        'idade' => 30,
        'sobrenome' => 'Moura',
        'site' => 'https://andremoura.dev'
    ];

    echo json_encode($json);
