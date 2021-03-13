<?php

    session_start();

    require 'twconfig.php';
    require "vendor/autoload.php";

    use Abraham\TwitterOAuth\TwitterOAuth;

    if (!isset($_SESSION['tw_access_token']) && empty($_SESSION['tw_access_token'])) {
        echo '<a href="login.php">Login com Twitter</a>';
        exit;
    }

    $connection = new TwitterOAuth(
        API_KEY,
        API_SECRET_KEY,
        $_SESSION['tw_access_token']['oauth_token'],
        $_SESSION['tw_access_token']['oauth_token_secret']
    );

    $user = $connection->get('account/verify_credentials');

    //print_r($user);

    if (isset($_POST['message']) && !empty($_POST['message'])) {
        $message = $_POST['message'];

        $statuses = $connection->post("statuses/update", ["status" => $message]);

        echo 'Tweet publicado com sucesso!';
    }

?>

<form method="post">
    <textarea name="message" cols="30" rows="10"></textarea><br><br>
    <button>Enviar</button>
</form>