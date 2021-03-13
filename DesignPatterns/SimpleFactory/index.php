<?php

    require 'Facebook.php';

    $fb = new Facebook;

    $post = $fb->createPost();
    $post->setAuthor('André Moura');
    $post->setMessage('Essa é a mensagem da minha postagem');

    echo "AUTOR: {$post->getAuthor()}";
    echo '<hr>';

    $post2 = $fb->createPost();
    $post2->setAuthor('Fulano');
    $post2->setMessage('Mensagem 2');

    echo "AUTOR: {$post2->getAuthor()}";
    