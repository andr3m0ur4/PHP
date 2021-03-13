<?php

    require 'fb.php';

    $helper = $fb->getRedirectLoginHelper();

    $permissions = ['email'];

    $loginUrl = $helper->getLoginUrl('http://localhost:8080/callback.php/', $permissions);

?>

<a href="<?= htmlspecialchars($loginUrl) ?>">Fazer login com Facebook</a>