<?php

    require 'config.php';
    require 'classes/Reserva.php';
    require 'classes/Carro.php';

    $reservas = new Reserva($pdo);
    $carros = new Carro($pdo);
    $flag = false;

    if (empty($_GET['ano'])) {
        $flag = true;
    }

    require 'calendario.php';

    $lista = $reservas->getReservas($data_inicio, $data_fim);

    require 'template.php';
