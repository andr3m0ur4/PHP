<?php

    require 'Tempo.php';

    $t = '2020-12-03 18:00:00';
    $data = date('d/m/Y H:i:s', strtotime($t));

    echo "$data <br>foi há " . Tempo::diferenca($t) . ' atrás';
