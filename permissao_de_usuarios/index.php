<?php

    session_start();

    require 'config.php';
    require 'classes/Usuarios.php';
    require 'classes/Documentos.php';

    if (!isset($_SESSION['logado'])) {
        header('Location: login.php');
        exit;
    }

    $usuarios = new Usuarios($pdo);
    $usuarios->setUsuario($_SESSION['logado']);

    $documentos = new Documentos($pdo);
    $lista = $documentos->getDocumentos();

    require 'template-index.php';
