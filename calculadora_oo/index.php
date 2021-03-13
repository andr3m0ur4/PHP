<?php

    class Calculadora
    {
        private $numero;

        function __construct($numero)
        {
            $this->numero = $numero;
        }

        public function somar($numero)
        {
            $this->numero += $numero;
            return $this;
        }

        public function subtrair($numero)
        {
            $this->numero -= $numero;
            return $this;
        }

        public function multiplicar($numero)
        {
            $this->numero *= $numero;
            return $this;
        }

        public function dividir($numero)
        {
            $this->numero /= $numero;
            return $this;
        }

        public function resultado()
        {
            return $this->numero;
        }
    }

    $calc = new Calculadora(10);

    $calc->somar(10)->subtrair(3)->multiplicar(5)->dividir(2);
    //$calc->somar(2)->somar(10)->somar(5);
    $resultado = $calc->resultado();

    echo "Resultado = {$resultado}";
