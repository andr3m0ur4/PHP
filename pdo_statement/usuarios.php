<?php

    class Usuario
    {
        private $db;

        public function __construct()
        {
            try {

                $this->db = new PDO("mysql:dbname=blog;host=localhost;charset=utf8", "andre-moura", "andre");

            } catch (PDOException $e) {
                echo "FALHA: {$e->getMessage()}";
            }
        }

        public function selecionar($id)
        {
            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                return $sql->fetch(PDO::FETCH_OBJ);
            }
        }

        public function inserir($nome, $email, $senha)
        {
            $senha = md5($senha);
            $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
            $sql = $this->db->prepare($sql);
            $sql->bindParam(':nome', $nome);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':senha', $senha);
            $sql->execute();
        }

        public function atualizar($nome, $email, $senha, $id)
        {
            $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $sql->execute([
                $nome, $email, md5($senha), $id
            ]);
        }

        public function excluir($id)
        {
            $sql = "DELETE FROM usuarios WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
        }
    }
