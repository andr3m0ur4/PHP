<?php

    // PSR-4
    /* spl_autoload_register(function($class) {
        $base_dir = __DIR__ . DIRECTORY_SEPARATOR . 'pacotes' . DIRECTORY_SEPARATOR;
        
        $file = $base_dir . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
        
        if (file_exists($file)) {
            require $file;
        }
    }); */

    require __DIR__ . '/vendor/autoload.php';

    $clentinfo = new \AndreMoura\Clients\ClientInfo();
    $clientorder = new \AndreMoura\Clients\ClientOrder();
    $productinfo = new \AndreMoura\Products\ProductInfo();

    echo "Name: {$clentinfo->getName()}<br>";
    echo "Idade: {$clentinfo->getAge()}<hr>";

    print_r($clientorder->getAll());

    echo '<hr>';

    echo "Nome do produto: {$productinfo->getName()}";
