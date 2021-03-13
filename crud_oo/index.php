<?php

    include 'Contato.php';

    $contato = new Contato();

    $lista = $contato->obterTodos();
    
    include 'template-index.php';
