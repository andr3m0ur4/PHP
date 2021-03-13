<?php

    class Album extends Model
    {
        public function getList()
        {
            $array = [];

            $sql = "SELECT * FROM albuns";
            $sql = $this->db->query($sql);
            
            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(PDO::FETCH_OBJ);
            }

            return $array;
        }

        public function getAlbum($slug)
        {
            $array = [];

            $sql = "SELECT * FROM albuns WHERE slug = :slug";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':slug', $slug);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $array = $sql->fetch(PDO::FETCH_OBJ);
            }

            return $array;
        }
    }
