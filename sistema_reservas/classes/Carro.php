<?php

    class Carro
    {
        private $pdo;

        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        public function getCarros()
        {
            $array = [];

            $sql = "SELECT * FROM carros";
            $sql = $this->pdo->query($sql);

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(PDO::FETCH_OBJ);
            }

            return $array;
        }
    }
    