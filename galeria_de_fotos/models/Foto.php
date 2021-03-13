<?php

    class Foto extends Model
    {
        public function getFotos()
        {
            $array = [];

            $sql = "SELECT * FROM fotos ORDER BY id DESC";
            $sql = $this->db->query($sql);

            if ($sql->rowCount() > 0) {
                $array = $sql->fetchAll(PDO::FETCH_OBJ);
            }

            return $array;
        }

        public function saveFotos()
        {
            if (isset($_FILES['arquivo']) && !empty($_FILES['arquivo']['tmp_name'])) {
                $permitidos = [
                    'image/jpeg',
                    'image/jpg',
                    'image/png',
                    'image/gif'
                ];

                if (in_array($_FILES['arquivo']['type'], $permitidos)) {
                    $nome = md5(time() . rand(0, 999)) . '.jpg';

                    move_uploaded_file($_FILES['arquivo']['tmp_name'], "assets/images/galeria/{$nome}");

                    $titulo = $_POST['titulo'] ?? '';

                    $sql = "INSERT INTO fotos (titulo, url) VALUES (:titulo, :url)";
                    $sql = $this->db->prepare($sql);
                    $sql->bindValue(':titulo', $titulo);
                    $sql->bindValue(':url', $nome);
                    $sql->execute();
                }
            }
        }
    }
