<?php

    require 'jwt.php';

    $jwt = new JWT();
    $token = $jwt->create(['id_user' => 123, 'nome' => 'André Moura']);

    echo $token;
    