<?php

    class Tempo
    {
        static function diferenca($tempo)
        {
            $tempo = strtotime($tempo);
            $data = time();
            $diferenca = $data - $tempo;
            
            $dias = (int) ($diferenca / 86400);
            $diferenca %= 86400;
            $horas = (int) ($diferenca / 3600);
            $diferenca %= 3600;
            $minutos = (int) ($diferenca / 60);

            if ($dias > 0) {
                return "$dias dias";
            } else if ($horas > 0) {
                return "$horas horas";
            } else {
                return "$minutos minutos";
            }
        }
    }
    