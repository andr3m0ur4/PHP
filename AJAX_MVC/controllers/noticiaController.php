<?php

    class noticiaController extends Controller
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            $dados = [];

            $this->loadTemplate('galeria', $dados);
        }

        public function abrir($id)
        {
            echo "ID da notícia: {$id}<br>";
        }

        public function abrirTitulo($titulo)
        {
            echo "TITULO: {$titulo}";
        }
    }
