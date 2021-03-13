<?php

    session_start();

    require 'twconfig.php';
    require "vendor/autoload.php";

    use Abraham\TwitterOAuth\TwitterOAuth;

    $request_token = [
        'oauth_token' => $_SESSION['oauth_token'],
        'oauth_token_secret' => $_SESSION['oauth_token_secret']
    ];

    $connection = new TwitterOAuth(
        API_KEY,
        API_SECRET_KEY,
        $request_token['oauth_token'],
        $request_token['oauth_token_secret']
    );

    $_SESSION['tw_access_token'] = $connection->oauth('oauth/access_token', [
        'oauth_verifier' => $_GET['oauth_verifier']
    ]);

    header('Location: /');
    