<?php

    class Language
    {
        private $l;
        private $ini;

        public function __construct()
        {
            $this->l = 'en';

            if (!empty($_SESSION['lang']) && file_exists('lang/' . $_SESSION['lang'] . '.ini')) {
                $this->l = $_SESSION['lang'];
            }

            $this->ini = parse_ini_file("lang/{$this->l}.ini");
        }
        public function getLanguage()
        {
            return $this->l;
        }

        public function get($word, $return = false)
        {
            $text = $word;

            if (isset($this->ini[$word])) {
                $text = $this->ini[$word];
            }

            if ($return) {
                return $text;
            } else {
                echo $text;
            }
        }
    }
