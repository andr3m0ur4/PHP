<?php

    interface OutputInterface
    {
        public function load($data);
    }

    class JsonOutput implements OutputInterface
    {
        public function load($data)
        {
            return json_encode($data);
        }
    }

    class ArrayOutput implements OutputInterface
    {
        public function load($data)
        {
            return $data;
        }
    }

    class Produto
    {
        private $array;
        private $output;

        public function getlista()
        {
            $this->array = [
                ['nome' => 'André', 'id' => 1],
                ['nome' => 'Fulano', 'id' => 2]
            ];
        }

        public function setOutput(OutputInterface $outputType)
        {
            $this->output = $outputType;
        }

        public function getOutput()
        {
            return $this->output->load($this->array);
        }
    }

    $produto = new Produto;
    $produto->getlista();

    $produto->setOutput(new JsonOutput);
    $data = $produto->getOutput();

    print_r($data);
