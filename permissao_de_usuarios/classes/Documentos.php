<?php

    class Documentos
    {
        private $pdo;

        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }

        public function getDocumentos()
        {
            $array = [];

            $sql = $this->pdo->query("SELECT * FROM documentos");
            
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(PDO::FETCH_OBJ);
            }

            return $array;
        }
    }
    