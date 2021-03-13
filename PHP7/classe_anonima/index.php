<?php

    $carro = new class
    {
        public function getNome()
        {
            return 'Carro 2.0';
        }
    };

    //echo $carro->getNome();

    function criar_carro()
    {
        return new class
        {
            public function getNome()
            {
                return 'Carro 3.0';
            }
        };
    }

    $carro = criar_carro();
    //echo $carro->getNome();

    /* class Automovel
    {
        private $carro;

        public function setCarro($carro)
        {
            $this->carro = $carro;
        }

        public function getName()
        {
            return $this->carro->getName();
        }
    } */

    $automovel = new class
    {
        private $carro;

        public function setCarro($carro)
        {
            $this->carro = $carro;
        }

        public function getName()
        {
            return $this->carro->getName();
        }
    };

    $automovel->setCarro(new class
    {
        public function getName()
        {
            return 'Carro 6.0';
        }
    });

    echo $automovel->getName();
