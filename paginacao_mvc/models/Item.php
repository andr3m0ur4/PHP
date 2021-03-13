<?php

    class Item extends Model
    {
        public function getList($offset, $limit)
        {
            $array = [];

            $sql = "SELECT * FROM items LIMIT $offset, $limit";
            $sql = $this->db->query($sql);

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(PDO::FETCH_OBJ);
            }

            return $array;
        }

        public function getTotal()
        {
            $sql = "SELECT COUNT(*) AS c FROM items";
            $sql = $this->db->query($sql);
            $sql = $sql->fetch(PDO::FETCH_OBJ);

            return $sql->c;
        }
    }
