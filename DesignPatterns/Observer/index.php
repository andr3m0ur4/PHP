<?php

    class UsuarioObserver
    {
        public function update(Usuario $subject)
        {
            echo date('H:i') . " - ALERTA - USUÁRIO ALTERADO: {$subject->getName()} <hr>";
        }
    }

    class Usuario
    {
        private $name;
        private $observers = [];

        public function __construct($name)
        {
            $this->name = $name;
        }

        public function attach(UsuarioObserver $observer)
        {
            $this->observers[] = $observer;
        }

        public function detach(UsuarioObserver $observer)
        {
            foreach ($this->observers as $key => $value) {
                if ($observer == $value) {
                    unset($this->observers[$key]);
                }
            }
        }

        public function notify()
        {
            foreach ($this->observers as $observer) {
                $observer->update($this);
            }
        }

        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;

            $this->notify();
        }
    }

    $olheiro = new UsuarioObserver;

    $usuario = new Usuario('André');
    $usuario->attach($olheiro);

    echo "MEU NOME É: {$usuario->getName()} <hr>";

    $usuario->setName('Fulano');

    echo "MEU NOME É: {$usuario->getName()} <hr>";

    //$usuario->detach($olheiro);

    $usuario->setName('Ciclano');

    echo "MEU NOME É: {$usuario->getName()} <hr>";
