<?php

    use PHPUnit\Framework\TestCase;

    class UsuarioTest extends TestCase
    {
        public function testExpectedNomeCompleto()
        {
            $this->expectOutputString('André Moura');

            $usuario = new Usuario();
            $usuario->setNome('André');
            $usuario->setSobrenome('Moura');
            echo $usuario->getNomeCompleto();
        }

        public function testIdade()
        {
            $usuario = new Usuario();
            $usuario->setIdade(30);

            $this->assertEquals(30, $usuario->getIdade());

            //$this->markTestIncomplete('Resta implementar o get e set de IDADE!');
        }

        public function testIdadeString()
        {
            $this->markTestIncomplete('Precisa implementar método para retornar idade com string!');
        }
    }
