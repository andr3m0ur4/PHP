<?php

    spl_autoload_register(function($class) {

        require "classes/{$class}.php";
        
    });

    $cachorro = new Cachorro;
    $cachorro->falar();

    $pessoa = new Pessoa;
    $pessoa->andar();
