<?php

    class Modulo extends Model
    {
        public function getList()
        {
            $array = [];

            $sql = "SELECT * FROM modulos";
            $sql = $this->db->query($sql);

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(PDO::FETCH_OBJ);
            }

            return $array;
        }
    }
