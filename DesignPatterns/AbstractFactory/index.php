<?php

    abstract class Video
    {
        abstract public function render();
    }

    abstract class AbstractFactory
    {
        abstract public function createPlayer($url);
    }

    class HtmlFactory extends AbstractFactory
    {
        public function createPlayer($url)
        {
            return new HtmlPlayer($url);
        }
    }

    class HtmlPlayer extends Video
    {
        private $url;

        public function __construct($url)
        {
            $this->url = $url;
        }

        public function render()
        {
            echo "<video>{$this->url}</video>";
        }
    }

    class FlashFactory extends AbstractFactory
    {
        public function createPlayer($url)
        {
            return new FlashPlayer($url);
        }
    }

    class FlashPlayer extends FlashFactory
    {
        private $url;

        public function __construct($url)
        {
            $this->url = $url;
        }

        public function render()
        {
            echo "<object>{$this->url}</object>";
        }
    }

    $factory = new HtmlFactory;
    //$factory = new FlashPlayer('123');
    $player = $factory->createPlayer('123');
    $player->render();
