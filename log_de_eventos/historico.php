<?php

    class Historico
    {
        private $pdo;

        public function __construct()
        {
            $this->pdo = new PDO("mysql:dbname=blog;host=localhost;charset=utf8", "andre-moura", 'andre');
        }

        public function registrar($acao)
        {
            $ip = $_SERVER['REMOTE_ADDR'];

            $sql = "INSERT INTO historico(ip, data_acao, acao) VALUES (:ip, NOW(), :acao)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':ip', $ip);
            $sql->bindValue(':acao', $acao);
            $sql->execute();
        }
    }
