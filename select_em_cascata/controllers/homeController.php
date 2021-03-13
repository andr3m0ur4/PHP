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

            $modulos = new Modulo;

            $dados['modulos'] = $modulos->getList();

            $this->loadTemplate('home', $dados);
        }

        public function pegarAulas()
        {
            if (isset($_POST['modulo'])) {
                $id_modulo = $_POST['modulo'];

                $aulas = new Aula;

                $array = $aulas->getAulas($id_modulo);

                echo json_encode($array);
            }
        }
    }
