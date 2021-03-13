<?php

    class galeriaController extends Controller
    {
        public function index()
        {
            $albuns = new Album;

            $data = [
                'albuns' => $albuns->getList()
            ];

            $this->loadTemplate('galeria', $data);
        }

        public function abrir($slug)
        {
            $albuns = new Album;

            $data = [
                'info' => $albuns->getAlbum($slug)
            ];

            $this->loadTemplate('album', $data);
        }
    }
