<?php

    class Pessoa
    {
        public function __construct($nome, $data_nascimento)
        {
            $this->nome = $nome;
            list($dia, $mes, $ano) = explode('/', $data_nascimento);
            $this->data_nascimento = implode('-', [$ano, $mes, $dia]);
        }

        public function getNome()
        {
            return $this->nome;
        }

        public function getIdade()
        {
            $ano = $this->calcularIdade($this->data_nascimento);
            return $ano;
        }

        private function calcularIdade($data)
        {
            $tempo = strtotime($data);

            if ($tempo === false) {
                return '';
            }

            $ano_diferenca = '';
            $data = date('Y-m-d', $tempo);
            list($ano, $mes, $dia) = explode('-', $data);
            $ano_diferenca = date('Y') - $ano;
            $mes_diferenca = date('m') - $mes;
            $dia_diferenca = date('d') - $dia;

            if ($dia_diferenca < 0 || $mes_diferenca < 0) $ano_diferenca--;

            return $ano_diferenca;
        }
    }
    