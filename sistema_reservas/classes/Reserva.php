<?php

    class Reserva
    {
        private $pdo;

        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }
        public function getReservas($data_inicio, $data_fim)
        {
            $array = [];

            $sql = "SELECT r.*, c.nome AS carro FROM reservas AS r
                LEFT JOIN carros AS c
                ON (id_carro = c.id)
                WHERE NOT(data_inicio > :data_fim OR data_fim < :data_inicio)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':data_inicio', $data_inicio);
            $sql->bindValue(':data_fim', $data_fim);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(PDO::FETCH_OBJ);
            }

            return $array;
        }

        public function verificarDisponibilidade($carro, $data_inicio, $data_fim)
        {
            $sql = "SELECT * FROM reservas 
                WHERE id_carro = :id_carro AND NOT(data_inicio > :data_fim OR data_fim < :data_inicio)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':id_carro', $carro);
            $sql->bindValue(':data_inicio', $data_inicio);
            $sql->bindValue(':data_fim', $data_fim);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return false;
            }

            return true;
        }

        public function reservar($carro, $data_inicio, $data_fim, $pessoa)
        {
            $sql = "INSERT INTO reservas (id_carro, data_inicio, data_fim, pessoa)
                VALUES (:id_carro, :data_inicio, :data_fim, :pessoa)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue('id_carro', $carro);
            $sql->bindValue(':data_inicio', $data_inicio);
            $sql->bindValue(':data_fim', $data_fim);
            $sql->bindValue(':pessoa', $pessoa);
            $sql->execute();
        }
    }
