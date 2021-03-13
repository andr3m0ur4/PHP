<?php

    require 'fb.php';

    use Facebook\Exceptions\FacebookResponseException;
    use Facebook\Exceptions\FacebookSDKException;

    $helper = $fb->getRedirectLoginHelper();

    try {
        $_SESSION['fb_access_token'] = (string) $helper->getAccessToken();
    } catch (FacebookResponseException $e) {
        die("ERRO: {$e->getMessage()}");
    } catch (FacebookSDKException $e) {
        die("ERRO SDK: {$e->getMessage()}");
    }

    header('Location: /');
