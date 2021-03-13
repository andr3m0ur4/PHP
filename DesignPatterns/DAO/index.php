<?php

    class Database
    {
        protected $db;

        public function __construct()
        {
            try {
                $this->db = new PDO('mysql:dbname=blog;host=10.0.0.102', 'andre-moura', 'andre');
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }

    class UsuarioDAO extends Database
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function get($fields = [], $where = [])
        {
            $usuarios = [];
            $values = [];

            if (count($fields) == 0) {
                $fields = ['*'];
            }

            $fields = implode(', ', $fields);
            $sql = "SELECT $fields FROM usuarios";

            if (count($where) > 0) {
                $keys = array_keys($where);
                $values = array_values($where);
                $helper = [];

                foreach ($keys as $key) {
                    $helper[] = "$key = ?";
                }

                $keys = implode(' AND ', $helper);
                $sql .= " WHERE $keys";
            }

            $sql = $this->db->prepare($sql);
            $sql->execute($values);

            if ($sql->rowCount() > 0) {
                foreach ($sql->fetchAll() as $usuario) {
                    $usuarios[] = new Usuario($usuario);
                }
            }

            return $usuarios;
        }

        public function insert(Usuario $usuario)
        {
            $fields = [
                'nome' => $usuario->getNome(),
                'email' => $usuario->getEmail(),
                'senha' => $usuario->getSenha()
            ];

            if (count($fields) > 0) {
                $questions = [];

                for ($i = 0; $i < count($fields); $i++) {
                    $questions[] = '?';
                }

                $keys = implode(', ', array_keys($fields));
                $values = implode(', ', $questions);
                $sql = "INSERT INTO usuarios ($keys) VALUES ($values)";
                $sql = $this->db->prepare($sql);
                $sql->execute(array_values($fields));
            }
        }
    }

    class Usuario
    {
        private $nome;
        private $email;
        private $senha;
        private $id;

        public function __construct($array)
        {
            $this->nome = $array['nome'] ?? '';
            $this->email = $array['email'] ?? '';
            $this->senha = $array['senha'] ?? '';
            $this->id = $array['id'] ?? '';
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getSenha()
        {
            return $this->senha;
        }

        public function getId()
        {
            return $this->id;
        }
    }

    $usuarioDAO = new UsuarioDAO;

    $usuario = new Usuario([
        'nome' => 'José',
        'email' => 'jose@teste.com',
        'senha' => md5('jose')
    ]);

    $usuarioDAO->insert($usuario);

    $usuarios = $usuarioDAO->get();

    foreach ($usuarios as $usuario) {
        echo "NOME: {$usuario->getNome()} - ";
        echo "E-MAIL: {$usuario->getEmail()} <hr>";
    }
