<?php

    class notFoundController extends Controller
    {
        public function __construct()
        {
            parent::__construct();
        }
        
        public function index()
        {
            $this->loadView('404', []);
        }
    }
