<?php

    require 'fb.php';

    if (!isset($_SESSION['fb_access_token']) && empty($_SESSION['fb_access_token'])) {
        header('Location: login.php');
    }

    $response = $fb->get('/me?fields=email,name,id,picture', $_SESSION['fb_access_token']);

    $result = $response->getGraphNode();

    $img = $result->getField('picture')->getField('url');
    $user_id = $result->getField('id');

    $response = $fb->get(
        $user_id . '?fields=birthday,email,hometown',
        $_SESSION['fb_access_token']
    );
    $result = $response->getGraphNode();

    echo '<pre>';
    print_r($result);

?>
<br>
<img src="<?= $img ?>" alt=""> <br>
<a href="sair.php">Sair</a>