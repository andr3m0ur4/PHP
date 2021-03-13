<?php

try {
    $pdo = new PDO('mysql:dbname=rating;host=localhost;charset=utf8', 'andre-moura', 'andre');
} catch(PDOException $e) {
    die("ERRO: {$e->getMessage()}");
}
