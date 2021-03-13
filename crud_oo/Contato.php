<?php

    class Contato
    {
        private $pdo;

        public function __construct()
        {
            $this->pdo = new PDO("mysql:dbname=blog;host=10.0.0.102;charset=utf8", "andre-moura", "andre");
        }

        public function adicionar($email, $nome = '')
        {
            if (!$this->verificarEmail($email)) {
                $sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':email', $email);
                $sql->execute();

                return true;
            }

            return false;
        }

        public function obterInfo($id)
        {
            $sql = "SELECT nome, email FROM contatos WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $info = $sql->fetch(PDO::FETCH_OBJ);

                return $info;
            } else {
                return '';
            }
        }

        public function obterTodos()
        {
            $sql = "SELECT * FROM contatos";
            $sql = $this->pdo->query($sql);

            if ($sql->rowCount() > 0) {
                return $sql->fetchAll(PDO::FETCH_OBJ);
            } else {
                return array();
            }
        }

        public function editar($id, $nome, $email, $email_orginal)
        {
            if ($email != $email_orginal) {
                if ($this->verificarEmail($email)) {
                    return false;
                }
            }

            $sql = "UPDATE contatos SET nome = :nome, email = :email WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':id', $id);
            $sql->execute();

            return true;
        }

        public function excluir($id)
        {
            $sql = "DELETE FROM contatos WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
        }

        private function verificarEmail($email)
        {
            $sql = "SELECT * FROM contatos WHERE email = :email";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }

        
    }
