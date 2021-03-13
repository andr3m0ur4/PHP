<?php

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://postman-echo.com/post');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'nome=Andre&idade=31&sexo=masculino');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $resposta = curl_exec($ch);
    curl_close($ch);

    print_r($resposta);
    