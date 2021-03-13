<?php

    class ajaxController extends Controller
    {
        public function __construct()
        {
            parent::__construct();
        }
        
        public function index()
        {
            $dados = [
                'frase' => ''
            ];

            if (isset($_POST['nome']) && !empty($_POST['nome'])) {
                $nome = addslashes($_POST['nome']);

                $dados['frase'] = "Meu nome: {$nome}";
            }

            //$this->loadView('ajax', $dados);
            echo json_encode($dados);
        }
    }
