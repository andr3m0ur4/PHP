<?php

    class Core
    {
        public function run()
        {
            $url = '/';
            $url .= $_GET['url'] ?? '';
            $params = [];

            $url = $this->checkRoutes($url);

            if (!empty($url) && $url != '/') {
                $url = explode('/', $url);
                array_shift($url);
                
                $currentController = $url[0] . 'Controller';
                array_shift($url);

                if (isset($url[0]) && !empty($url[0])) {
                    $currentAction = explode('-', $url[0]);

                    if (count($currentAction) > 1) {
                        $currentAction = $currentAction[0] . ucfirst($currentAction[1]);
                    } else {
                        $currentAction = $currentAction[0];
                    }
                    
                    array_shift($url);
                } else {
                    $currentAction = 'index';
                }

                if (count($url) > 0) {
                    $params = $url;
                }
            } else {
                $currentController = 'homeController';
                $currentAction = 'index';
            }
            
            if (
                !file_exists("controllers/{$currentController}.php") || 
                !method_exists($currentController, $currentAction))
            {
                $currentController = 'notFoundController';
                $currentAction = 'index';
            }

            $controller = new $currentController();

            call_user_func_array([$controller, $currentAction], $params);

        }

        public function checkRoutes($url)
        {
            global $routes;
            
            foreach ($routes as $route => $new_url) {

                // Identifica os argumentos e substitui por REGEX
                $pattern = preg_replace('(\{[a-z0-9]{1,}\})', '([a-z0-9-]{1,})', $route);

                // Faz o match da URL
                if (preg_match("#^({$pattern})*$#i", $url, $matches) === 1) {
                    array_shift($matches);
                    array_shift($matches);

                    // Pega todos os argumentos para associar
                    $itens = [];

                    if (preg_match_all('(\{[a-z0-9]{1,}\})', $route, $match)) {
                        $itens = preg_replace('(\{|\})', '', $match[0]);
                    }

                    // Faz a associação
                    $argument = [];

                    foreach ($matches as $key => $match) {
                        $argument[$itens[$key]] = $match;
                    }

                    // Monta a nova URL
                    foreach ($argument as $argument_key => $argument_value) {
                        $new_url = str_replace(":{$argument_key}", $argument_value, $new_url);
                    }

                    $url = $new_url;

                    break;
                }
            }

            return $url;
        }
    }
