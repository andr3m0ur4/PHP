<?php

    class Character
    {
        private $properties;

        public function setProperty($name, $value)
        {
            $this->properties[$name] = $value;
        }

        public function getAllProperties()
        {
            return $this->properties;
        }
    }

    interface BuilderInterface
    {
        public function createCharacter();
        public function addHelmet();
        public function addWeapon();
        public function addBoots();
        public function getCharacter();
    }

    class Director
    {
        public function build(BuilderInterface $builder)
        {
            $builder->createCharacter();
            $builder->addHelmet();
            $builder->addWeapon();
            $builder->addBoots();
            return $builder->getCharacter();
        }
    }

    class MarioBuilder implements BuilderInterface
    {
        private $character;

        public function createCharacter()
        {
            $this->character = new Character;
        }

        public function addHelmet()
        {
            $this->character->setProperty('helmet', 'red');
        }

        public function addWeapon()
        {
            $this->character->setProperty('lefthand', 'gloves');
            $this->character->setProperty('righthand', 'gloves');
        }

        public function addBoots()
        {
            $this->character->setProperty('leftfoot', 'brown boot');
            $this->character->setProperty('rightfoot', 'brown boot');
        }

        public function getCharacter()
        {
            return $this->character;
        }
    }

    class LuigiBuilder implements BuilderInterface
    {
        private $character;

        public function createCharacter()
        {
            $this->character = new Character;
        }

        public function addHelmet()
        {
            $this->character->setProperty('helmet', 'green');
        }

        public function addWeapon()
        {
            $this->character->setProperty('lefthand', 'gloves');
            $this->character->setProperty('righthand', 'gloves');
        }

        public function addBoots()
        {
            $this->character->setProperty('leftfoot', 'white boot');
            $this->character->setProperty('rightfoot', 'white boot');
        }

        public function getCharacter()
        {
            return $this->character;
        }
    }

    $mario = (new Director)->build(new MarioBuilder);
    //print_r($mario->getAllProperties());

    $luigi = (new Director)->build(new LuigiBuilder);
    print_r($luigi->getAllProperties());
