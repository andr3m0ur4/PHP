<?php

    session_start();

    if (!empty($_GET['lang'])) {
        $_SESSION['lang'] = $_GET['lang'];
    }

    require 'Language.php';
    $lang = new Language;

    ?>

    <a href="index.php?lang=en">English</a>
    <a href="index.php?lang=pt-br">Portugês</a>
    <hr>
    Liguagem definida: <?= $lang->getLanguage() ?>
    <hr>

    <?= $lang->get('NAME') ?>: André Moura <br>
    <button><?= $lang->get('BUY') ?></button>
    <a href=""><?= $lang->get('LOGOUT') ?></a>