<?php

    include 'Contato.php';
    $contato = new Contato();

    if (!empty($_POST['id'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $id = $_POST['id'];
        $email_original = $_POST['email_original'];

        if (!empty($email)) {
            $contato->editar($id, $nome, $email, $email_original);
        }

        header('Location: index.php');
    }

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];

        $info = $contato->obterInfo($id);

        include 'template-editar.php';
    } else {
        header('Location: index.php');
    }
