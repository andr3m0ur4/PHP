<?php

    namespace Core;

    class Controller
    {
        public function __construct()
        {
            global $_PUT;
            global $_DELETE;
            
            $_SERVER['REQUEST_METHOD'] === 'PUT'
                ? parse_str(file_get_contents('php://input'), $_PUT)
                : $_PUT = [];

            $_SERVER['REQUEST_METHOD'] === 'DELETE'
                ? parse_str(file_get_contents('php://input'), $_DELETE)
                : $_DELETE = [];
        }

        public function loadView($viewName, $viewData = [])
        {
            extract($viewData);

            require "Views/{$viewName}.php";
        }

        public function loadTemplate($viewName, $viewData = [])
        {
            require 'Views/template.php';
        }

        public function loadViewInTemplate($viewName, $viewData = [])
        {
            extract($viewData);
            
            require "Views/{$viewName}.php";
        }
    }
