<?php

    session_start();

    require 'twconfig.php';
    require "vendor/autoload.php";

    use Abraham\TwitterOAuth\TwitterOAuth;

    $connection = new TwitterOAuth(API_KEY, API_SECRET_KEY);

    $request_token = $connection->oauth('oauth/request_token', [
        'oauth_callback' => OAUTH_CALLBACK
    ]);

    $_SESSION['oauth_token'] = $request_token['oauth_token'];
    $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

    $url = $connection->url('oauth/authorize', [
        'oauth_token' => $request_token['oauth_token']
    ]);

    header("Location: $url");
