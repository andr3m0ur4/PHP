<?php

    require 'Carro.php';

    $carro = new Carro;
    $carro->setCor('branco');
    $carro->setTipoCor('perolizado');

    echo $carro->getCorCompleta();
