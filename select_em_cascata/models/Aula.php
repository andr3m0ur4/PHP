<?php

    class Aula extends Model
    {
        public function getAulas($id_modulo)
        {
            $array = [];

            $sql = "SELECT * FROM aulas WHERE id_modulo = :id_modulo";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_modulo', $id_modulo);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(PDO::FETCH_OBJ);
            }

            return $array;
        }
    }
    