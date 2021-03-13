<?php

    class Usuario
    {
        private $nome;
        private $sobrenome;
        private $idade;

        public function setNome($nome)
        {
            $this->nome = $nome;
        }

        public function setSobrenome($nome)
        {
            $this->sobrenome = $nome;
        }

        public function getNomeCompleto()
        {
            return "{$this->nome} {$this->sobrenome}";
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
