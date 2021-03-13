<?php

    class galeriaController extends Controller
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            $dados = [
                'qt' => 129
            ];

            $this->loadTemplate('galeria', $dados);
        }

        public function abrir($id, $titulo)
        {
            echo "ID: {$id}<br>";
            echo "TITULO: {$titulo}";
        }
    }
