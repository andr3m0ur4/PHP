<?php

    session_start();

    $x = rand(0, 9);
    $y = rand(0, 9);

    $_SESSION['resultado'] = $x + $y;

    require './view.php';
