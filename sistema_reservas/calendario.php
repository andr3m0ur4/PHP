<?php

    $ano = addslashes($_GET['ano'] ?? 2020);
    $mes = addslashes($_GET['mes'] ?? 01);
    $data = "{$ano}-{$mes}";
    $dia1 = date('w', strtotime($data));
    $dias = date('t', strtotime($data));
    $linhas = ceil(($dia1 + $dias) / 7);
    $dia1 = -$dia1;
    $data_inicio = date('Y-m-d', strtotime("{$dia1} days", strtotime($data)));
    $data_fim = date('Y-m-d', strtotime($dia1 + ($linhas * 7) - 1 . ' days', strtotime($data)));
    $ano_atual = $_GET['ano'] ?? date('Y');
    $mes_atual = $_GET['mes'] ?? '';

    function formatarCalendario($linha, $dia, $data) {
        return date('Y-m-d', strtotime($dia + ($linha * 7) . ' days', strtotime($data)));
    }

    function formatarData($data) {
        return date('d', strtotime($data));
    }

    function verificarReserva($reserva, $atual) {
        $data_inicio = strtotime($reserva->data_inicio);
        $data_fim = strtotime($reserva->data_fim);
        $atual = strtotime($atual);

        if ($atual >= $data_inicio && $atual <= $data_fim) {
            return "{$reserva->pessoa} ({$reserva->carro}) <br>";
        }
    }

    function verificarMes($mes_atual, $mes) {
        return $mes_atual == $mes ? 'selected' : '';
    }
