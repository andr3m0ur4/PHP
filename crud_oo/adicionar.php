<?php

    include 'Contato.php';

    $contato = new Contato();

    if (isset($_POST['nome']) && !empty($_POST['nome'])) {
        
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $contato->adicionar($email, $nome);

        header('Location: index.php');
    }

    include 'template-adicionar.php';
