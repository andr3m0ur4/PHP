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

            $this->loadTemplate('home', $data);
        }
    }
