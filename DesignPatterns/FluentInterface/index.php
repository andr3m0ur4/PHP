<?php

    class Person
    {
        private $name;
        private $lastname;
        private $age;

        public function setName($name)
        {
            $this->name = $name;
            return $this;
        }

        public function setLastName($name)
        {
            $this->lastname = $name;
            return $this;
        }

        public function setAge($age)
        {
            $this->age = $age;
            return $this;
        }

        public function getFullName()
        {
            return "{$this->name} {$this->lastname} = {$this->age} years";
        }
    }

    $person = new Person;
    $person->setName('André')->setLastName('Moura')->setAge(30);
    echo "Nome: {$person->getFullName()}";
