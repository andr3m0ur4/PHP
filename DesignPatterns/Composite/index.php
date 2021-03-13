<?php

    interface RenderableInterface
    {
        public function render();
    }

    class Form implements RenderableInterface
    {
        private $elements;

        public function addElement(RenderableInterface $element)
        {
            $this->elements[] = $element;
        }

        public function render()
        {
            $html = '<form>';

            foreach ($this->elements as $element) {
                $html .= $element->render();
            }

            $html .= '</form>';
            return $html;
        }
    }

    class Label implements RenderableInterface
    {
        private $text;

        public function __construct($text)
        {
            $this->text = $text;
        }

        public function render()
        {
            return "<label>{$this->text}</label><br>";
        }
    }

    class Input implements RenderableInterface
    {
        private $name;
        private $type;

        public function __construct($name, $type = 'text')
        {
            $this->name = $name;
            $this->type = $type;
        }

        public function render()
        {
            return "<input type=\"{$this->type}\" name=\"{$this->name}\"><br>";
        }
    }

    class SubmitButton implements RenderableInterface
    {
        private $text;

        public function __construct($text)
        {
            $this->text = $text;
        }

        public function render()
        {
            return "<button type=\"submit\">{$this->text}</button>";
        }
    }

    $form = new Form;

    $form->addElement(new Label('Usuário:'));
    $form->addElement(new Input('usuario'));

    $form->addElement(new Label('Senha:'));
    $form->addElement(new Input('senha', 'password'));

    $form->addElement(new SubmitButton('Enviar'));

    echo $form->render();
