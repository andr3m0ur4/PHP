<?php

    class Pessoa
    {
        private $nome;
        private $idade;

        public function __construct($nome, $idade)
        {
            $this->nome = $nome;
            $this->idade = $idade;
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function getIdade()
        {
            return $this->idade;
        }
    }

    class PessoaAdapter
    {
        private $sexo;
        private $pessoa;

        public function __construct(Pessoa $pessoa)
        {
            $this->pessoa = $pessoa;
        }

        public function setSexo($sexo)
        {
            $this->sexo = $sexo;
        }

        public function getSexo()
        {
            return $this->sexo;
        }

        public function getNome()
        {
            return $this->pessoa->getNome();
        }

        public function getIdade()
        {
            return $this->pessoa->getIdade();
        }
    }

    $pessoa = new Pessoa('André Moura', 30);

    $pa = new PessoaAdapter($pessoa);
    $pa->setSexo('masculino');

    echo "Nome: {$pa->getNome()}<br>";
    echo "Idade: {$pa->getIdade()}<br>";
    echo "Sexo: {$pa->getSexo()}<br>";
    