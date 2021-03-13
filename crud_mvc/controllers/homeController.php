<?php

    class homeController extends Controller
    {
        public function __construct()
        {
            parent::__construct();
        }
        
        public function index()
        {
            $data = [];

            $contatos = new Contato;
            $data['lista'] = $contatos->obterTodos();

            $this->loadTemplate('home', $data);
        }
    }
