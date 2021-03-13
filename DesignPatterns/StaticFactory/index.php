<?php

    final class StaticFactory
    {
        public static function make($type)
        {
            if ($type == 'number') {
                return new FormatNumber;
            }
            if ($type == 'string') {
                return new FormatString;
            }
        }
    }

    interface FormatterInterface
    {
        public function format($param);
    }

    class FormatNumber
    {
        public function format($param)
        {
            echo "Formatando um número: $param";
        }
    }

    class FormatString
    {
        public function format($param)
        {
            echo "Formatando uma string: $param";
        }
    }

    $formatter = StaticFactory::make('number');
    $formatter->format('testando 1, 2, 3');
