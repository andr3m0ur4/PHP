<?php

    class Pessoa
    {
        private $nome;
        private $idade;

        public static function getInstance()
        {
            static $instance = null;

            if (is_null($instance)) {
                $instance = new Pessoa;
            }

            return $instance;
        }

        private function __construct()
        {
            
        }

        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function setIdade($idade)
        {
            $this->idade = $idade;
        }

        public function getIdade()
        {
            return $this->idade;
        }
    }

    $cara = Pessoa::getInstance();
    $cara->setNome('André Moura');
    echo "Nome: {$cara->getNome()} ";

    $cara2 = Pessoa::getInstance();
    $cara2->setIdade(30);
    echo "Idade: {$cara->getIdade()}";
