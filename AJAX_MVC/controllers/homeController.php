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

            $this->loadTemplate('home', $dados);
        }

        public function testar()
        {
            echo '123';
        }
    }
