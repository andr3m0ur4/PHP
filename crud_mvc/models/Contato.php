<?php

    class Contato extends Model
    {
        public function obterTodos()
        {
            $array = [];

            $sql = "SELECT * FROM contatos";
            $sql = $this->db->query($sql);

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(PDO::FETCH_OBJ);
            }

            return $array;
        }

        public function obter($id)
        {
            $array = [];

            $sql = "SELECT * FROM contatos WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetch(PDO::FETCH_OBJ);
            }

            return $array;
        }

        public function adicionar($nome, $email)
        {
            if (!$this->verificarEmail($email)) {
                $sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':email', $email);
                $sql->execute();

                return true;
            }

            return false;
        }

        public function editar($id, $nome, $email, $email_original)
        {
            if ($email != $email_original) {
                if ($this->verificarEmail($email)) {
                    return false;
                }
            }

            $sql = "UPDATE contatos SET nome = :nome, email = :email WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->bindValue(':id', $id);
            $sql->execute();

            return true;
        }

        public function excluir($id)
        {
            $sql = "DELETE FROM contatos WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
        }

        private function verificarEmail($email)
        {
            $sql = "SELECT * FROM contatos WHERE email = :email";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':email', $email);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return true;
            }

            return false;
        }
    }
