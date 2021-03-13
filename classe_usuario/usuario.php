<?php

    class Usuario
    {
        private $id;
        private $email;
        private $senha;
        private $nome;

        private $pdo;

        public function __construct($id = null)
        {
            try {
                $this->pdo = new PDO("mysql:dbname=blog;host=localhost;charset=utf8", "andre-moura", "andre");
            } catch (PDOException $e) {
                echo "FALHOU: {$e->getMessage()}";
            }

            if (!empty($id)) {
                $sql = "SELECT * FROM usuarios WHERE id = :id";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':id', $id);
                $sql->execute();

                if ($sql->rowCount() > 0) {
                    $data = $sql->fetch(PDO::FETCH_OBJ);
                    $this->id = $data->id;
                    $this->email = $data->email;
                    $this->senha = $data->senha;
                    $this->nome = $data->nome;
                }
            }
        }

        public function getId($id)
        {
            return $this->id;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setSenha($senha)
        {
            $this->senha = md5($senha);
        }

        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function salvar()
        {
            if (!empty($this->id)) {
                $sql = "UPDATE usuarios SET email = :email, senha = :senha, nome = :nome WHERE id = :id";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':email', $this->email);
                $sql->bindValue(':senha', $this->senha);
                $sql->bindValue(':nome', $this->nome);
                $sql->bindValue(':id', $this->id);
                $sql->execute();
            } else {
                $sql = "INSERT INTO usuarios (email, senha, nome) VALUES (:email, :senha, :nome)";
                $sql = $this->pdo->prepare($sql);
                $sql->bindValue(':email', $this->email);
                $sql->bindValue(':senha', $this->senha);
                $sql->bindValue(':nome', $this->nome);
                $sql->execute();
            }
        }

        public function excluir()
        {
            $sql = "DELETE FROM usuarios WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':id', $this->id);
            $sql->execute();
        }
    }
