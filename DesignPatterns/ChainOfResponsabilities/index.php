<?php

    class Carga
    {
        private $peso;

        public function __construct($peso)
        {
            $this->peso = $peso;
        }

        public function getPeso()
        {
            return $this->peso;
        }
    }

    class Moto
    {
        private $sucessor;

        public function setSucessor($sucessor)
        {
            $this->sucessor = $sucessor;
        }

        public function transport(Carga $carga)
        {
            if ($carga->getPeso() <= 500) {
                echo 'LEVOU DE MOTO!';
            } else {
                $this->sucessor->transport($carga);
            }
        }
    }

    class Carro
    {
        private $sucessor;

        public function setSucessor($sucessor)
        {
            $this->sucessor = $sucessor;
        }

        public function transport(Carga $carga)
        {
            if ($carga->getPeso() <= 5000) {
                echo 'LEVOU DE CARRO!';
            } else {
                $this->sucessor->transport($carga);
            }
        }
    }

    class Caminhao
    {
        private $sucessor;

        public function setSucessor($sucessor)
        {
            $this->sucessor = $sucessor;
        }

        public function transport(Carga $carga)
        {
            if ($carga->getPeso() <= 30000) {
                echo 'LEVOU DE CAMINHÃO!';
            } else {
                echo 'Não foi possível levar esta carga!';
            }
        }
    }

    $carga = new Carga(200);

    $moto = new Moto;
    $carro = new Carro;
    $caminhao = new Caminhao;

    $moto->setSucessor($carro);
    $carro->setSucessor($caminhao);

    $moto->transport($carga);
