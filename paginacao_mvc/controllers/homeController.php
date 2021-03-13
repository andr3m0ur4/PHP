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

            $items = new Item;

            $limit = 10;
            $current_page = intval($_GET['p'] ?? 1);
            $current_page = $current_page > 0 ? $current_page : 1;
            $offset = ($current_page * $limit) - $limit;

            $total = $items->getTotal();

            $data = [
                'items'=> $items->getList($offset, $limit),
                'paginas' => ceil($total / $limit),
                'pagina_atual' => $current_page
            ];

            $this->loadTemplate('home', $data);
        }
    }
