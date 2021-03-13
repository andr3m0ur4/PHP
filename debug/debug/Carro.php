<?php

    class Carro
    {
        private $cor;
        private $cor_tipo;

        public function __construct()
        {
            $this->cor = 'preto';
            $this->cor_tipo = 'fosco';
        }

        public function setCor($cor)
        {
            $this->cor = $cor;
        }

        public function setTipoCor($cor)
        {
            $this->cor_tipo = $cor;
        }

        public function getCorCompleta()
        {
            return "{$this->cor} {$this->cor_tipo}";
        }
    }
    