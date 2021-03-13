<?php

    class homeController extends Controller
    {
        public function __construct()
        {
            parent::__construct();
        }
        
        public function index()
        {
            $dados = [];

            $fotos = new Foto;

            $fotos->saveFotos();
            
            $dados['fotos'] = $fotos->getFotos();

            $this->loadTemplate('home', $dados);
        }
    }
