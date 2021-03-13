<?php

    use PHPUnit\Framework\TestCase;

    class EnvironmentTest extends TestCase
    {
        /* 
        public function testFalhaNoInclude()
        {
            $this->expectError();

            include './config.php';
        } */

        public function testInclude()
        {
            $this->assertTrue(
                file_exists('config.php')
            );
        }
    }
