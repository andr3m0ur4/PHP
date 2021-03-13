<?php

    require 'usuario.php';

    /*
    $usuario = new Usuario();
    
    $usuario->setEmail('teste@hotmail.com');
    $usuario->setSenha('123');
    $usuario->setNome('Testador');
    $usuario->salvar();

    echo "Usuário criado com sucesso!";
    */
    /*
    $usuario = new Usuario(14);
    echo "Meu nome é {$usuario->getNome()}";

    $usuario->setNome('Fulano de Tal');
    $usuario->salvar();

    echo "Usuário alterado com sucesso!";
    */
    $usuario = new Usuario(14);
    $usuario->excluir();

    echo "Usuário excluido com sucesso!";
