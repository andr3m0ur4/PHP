<?php

    class Carro
    {
        private $pdo;

        public function __construct(PDO $pdo)
        {
            $this->pdo = $pdo;
        }
    }
