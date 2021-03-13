<?php

    $xml = simplexml_load_file('ondas.xml');

    //echo '<pre>';
    //print_r($xml);

    /* echo "Cidade: {$xml->nome}<br><br>";

    echo "Manhã: {$xml->manha->vento}<br>";
    echo "Tarde: {$xml->tarde->vento}<br>";
    echo "Noite: {$xml->noite->vento}<br>"; */

    $array = [
        'nome' => 'André',
        'sobrenome' => 'Moura',
        'idade' => 30,
        'caracteristicas' => [
            'amigo',
            'fiel',
            'companheiro',
            'legal'
        ]
    ];

    function array_to_xml($data, &$xml_data) {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                if (is_numeric($key)) {
                    $key = "item{$key}";
                }

                $subnode = $xml_data->addChild($key);
                array_to_xml($value, $subnode);
            } else {
                if (is_numeric($key)) {
                    $key = "item{$key}";
                }

                $xml_data->addChild($key, htmlspecialchars($value));
            }
        }
    }

    $xml_data = new SimpleXMLElement('<data/>');

    array_to_xml($array, $xml_data);

    $result = $xml_data->asXML();
    //echo $result;

    $xml = simplexml_load_string($result);
    print_r($xml);
