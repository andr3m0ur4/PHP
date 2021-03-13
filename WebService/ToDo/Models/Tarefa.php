<?php

    namespace Models;

    use Core\Model;

    class Tarefa extends Model
    {
        public function listar()
        {
            $array = [];

            $sql = "SELECT * FROM tarefas";
            $sql = $this->db->query($sql);

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(\PDO::FETCH_OBJ);
            }

            return $array;
        }

        public function adicionarTarefa($titulo)
        {
            $sql = "INSERT INTO tarefas (titulo) VALUES (:titulo)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue('titulo', $titulo);
            $sql->execute();
        }

        public function atualizarStatus($status, $id)
        {
            $sql = "UPDATE tarefas SET status = :status WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue('status', $status);
            $sql->bindValue('id', $id);
            $sql->execute();
        }

        public function deletarTarefa($id)
        {
            $sql = "DELETE FROM tarefas WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue('id', $id);
            $sql->execute();
        }
    }
    