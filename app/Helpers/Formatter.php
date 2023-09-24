<?php

namespace App\Helpers;

class Formatter
{

    private static $CPF_LENGHT = 11;
    private static $ISBN13_LENGHT = 13;

    public static function formatCPF(string $value): string|null
    {

        $cleanCPF = Formatter::clean($value);

        if (strlen($cleanCPF) === Formatter::$CPF_LENGHT) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cleanCPF);
        }

        return null;
    }

    public static function formatISBN13(string $value): string|null
    {

        $cleanISBN13 = Formatter::clean($value);

        if (strlen($cleanISBN13) === Formatter::$ISBN13_LENGHT) {
            return preg_replace("/(\d{3})(\d{1})(\d{6})(\d{2})(\d{1})/", "\$1-\$2-\$3-\$4-\$5", $cleanISBN13);
        }

        return null;
    }

    public static function clean(string $value): string
    {
        return preg_replace("/\D/", '', $value);
    }
}
