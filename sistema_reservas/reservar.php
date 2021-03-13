<?php

    require 'config.php';
    require 'classes/Reserva.php';
    require 'classes/Carro.php';

    $reservas = new Reserva($pdo);
    $carros = new Carro($pdo);
    $flag = false;

    if (!empty($_POST['carro'])) {
        $carro = addslashes($_POST['carro']);
        $data_inicio = addslashes($_POST['data_inicio']);
        $data_fim = addslashes($_POST['data_fim']);
        $pessoa = addslashes($_POST['pessoa']);

        if ($reservas->verificarDisponibilidade($carro, $data_inicio, $data_fim)) {
            $reservas->reservar($carro, $data_inicio, $data_fim, $pessoa);
            header('Location: index.php');
            exit;
        } else {
            $flag = true;
        }
    }

    $lista = $carros->getCarros();

    require 'template-reservar.php';
