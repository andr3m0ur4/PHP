<?php

    declare(strict_types = 1);

    function somar(float $a, float $b): float
    {
        return $a + $b;
    }

    function saoIguais(int $a, int $b): bool
    {
        if ($a === $b) {
            return true;
        } else {
            return false;
        }
    }

    echo "SOMA: " . somar(10 , 15);
    echo '<br>';

    echo saoIguais(5, 10);
