<?php

    use PHPUnit\Framework\TestCase;

    class AssertionTest extends TestCase
    {
        public function testArrayHasKey()
        {
            $assert = new Assertion();
            $array = $assert->getArray();

            $this->assertArrayHasKey('nome', $array);
        }

        public function testCount()
        {
            $assert = new Assertion();
            $array = $assert->getArray();

            $this->assertCount(2, $array);
        }

        public function testEmpty()
        {
            $assert = new Assertion();
            //$array = $assert->getArray();
            $array = [];

            $this->assertEmpty($array);
        }

        public function testContains()
        {
            $array = [1, 2, 3, 4, 5, 'andré'];

            $this->assertContains('andré', $array);
        }

        public function testContainOnly()
        {
            $array = [1, 2, 3, 4, 5];

            $this->assertContainsOnly('integer', $array);
        }

        public function testAttributeExists()
        {
            $this->assertClassHasAttribute('numero', Assertion::class);
        }

        public function testRegex()
        {
            $this->assertMatchesRegularExpression('/^[a-z]{3}$/', 'dia');
        }

        public function testDirExists()
        {
            $this->assertDirectoryExists('classes');
        }

        public function testDirPermission1()
        {
            $this->assertDirectoryIsReadable('tests');
        }

        public function testDirPermission2()
        {
            $this->assertDirectoryIsWritable('tests');
        }

        public function testFileEquals()
        {
            $this->assertFileEquals('lista1.txt', 'lista2.txt');
        }

        public function testBoolean1()
        {
            $this->assertTrue(is_file('lista1.txt'));
        }

        public function testBoolean2()
        {
            $this->assertFalse(is_file('tests'));
        }

        public function testNull()
        {
            $idade = null;

            $this->assertNull($idade);
        }

        public function testVarType()
        {
            $assert = new Assertion();

            $this->assertIsArray($assert->getArray());
        }

        public function testEqual()
        {
            $nome = 'andré';

            $this->assertEquals('andré', $nome);
        }

        public function testString()
        {
            $texto = 'André Moura é um desenvolvedor';

            $this->assertStringStartsWith('Andr', $texto);

            $this->assertStringEndsWith('dor', $texto);
        }

        public function testNumeros1()
        {
            $totalUsuarios = 10;

            //$this->assertGreaterThan(10, $totalUsuarios);

            $this->assertGreaterThanOrEqual(10, $totalUsuarios);
        }

        public function testNumeros2()
        {
            $totalUsuarios = 10;

            //$this->assertLessThan(10, $totalUsuarios);

            $this->assertLessThanOrEqual(10, $totalUsuarios);
        }
    }
